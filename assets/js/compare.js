/**
 * Versus, storefront comparison behaviour.
 *
 * Dependency-free. Uses event delegation, guards against double submission,
 * keeps the count badge in sync, announces changes to assistive tech via a
 * polite live region, and degrades gracefully when the network fails.
 */
(() => {
  const config = window.versusCompare;

  if (!config) {
    return;
  }

  /** Announce a short message to screen readers via the table's live region. */
  const announce = (message) => {
    if (!message) {
      return;
    }
    const region = document.querySelector('[data-versus-compare-status]');
    if (region) {
      region.textContent = '';
      // Reassign on the next frame so repeated identical messages re-announce.
      requestAnimationFrame(() => {
        region.textContent = message;
      });
    }
  };

  const setCount = (count) => {
    if (typeof count !== 'number' || Number.isNaN(count)) {
      return;
    }
    document.querySelectorAll('[data-versus-compare-count]').forEach((badge) => {
      badge.textContent = String(count);
      badge.toggleAttribute('hidden', count <= 0);
    });
  };

  const updateButtons = (productId, active, label) => {
    document
      .querySelectorAll(`[data-versus-compare-button][data-product-id="${productId}"]`)
      .forEach((button) => {
        button.classList.toggle('is-active', active);
        button.setAttribute('aria-pressed', active ? 'true' : 'false');
        if (label) {
          button.textContent = label;
        }
      });
  };

  const post = async (params) => {
    const response = await fetch(config.ajaxUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
      body: new URLSearchParams(params).toString(),
    });

    // A refusal (e.g. Versus Pro's same-category rule) answers 4xx with a JSON
    // message; keep it so the shopper is told why.
    const payload = await response.json().catch(() => null);

    if (!payload) {
      throw new Error(`HTTP ${response.status}`);
    }

    return payload;
  };

  /** Show an error as a WooCommerce notice: above the products when the page has a notices area, else next to the button. */
  const showError = (message, near) => {
    if (!message) {
      return;
    }
    document.querySelectorAll('[data-versus-compare-error]').forEach((old) => old.remove());
    const notice = document.createElement('ul');
    notice.className = 'woocommerce-error';
    notice.setAttribute('role', 'alert');
    notice.setAttribute('data-versus-compare-error', '');
    notice.appendChild(document.createElement('li')).textContent = message;
    const wrapper = document.querySelector('.woocommerce-notices-wrapper');
    if (wrapper) {
      wrapper.prepend(notice);
    } else {
      near.insertAdjacentElement('afterend', notice);
    }
    notice.scrollIntoView({ block: 'nearest', behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
  };

  document.addEventListener('click', async (event) => {
    const target = event.target;

    // Clicks can land on non-Element nodes (e.g. text nodes); guard closest().
    if (!target || typeof target.closest !== 'function') {
      return;
    }

    const clearButton = target.closest('[data-versus-compare-clear]');

    if (clearButton) {
      event.preventDefault();

      if (clearButton.getAttribute('aria-busy') === 'true') {
        return;
      }

      clearButton.setAttribute('aria-busy', 'true');

      try {
        const payload = await post({ action: config.clearAction, nonce: config.nonce });

        if (payload && payload.success) {
          window.location.href = (payload.data && payload.data.compare_url) || window.location.href;
        } else {
          showError((payload && payload.data && payload.data.message) || config.errorText || '', clearButton);
          clearButton.removeAttribute('aria-busy');
        }
      } catch (error) {
        showError(config.errorText || '', clearButton);
        clearButton.removeAttribute('aria-busy');
      }

      return;
    }

    const button = target.closest('[data-versus-compare-button]');

    if (!button) {
      return;
    }

    event.preventDefault();

    if (!config.allowGuests && !document.body.classList.contains('logged-in')) {
      window.location.href = config.loginUrl;
      return;
    }

    const productId = button.dataset.productId;

    if (!productId) {
      return;
    }

    // Guard against double submissions while a request is in flight.
    if (button.getAttribute('aria-busy') === 'true') {
      return;
    }

    button.disabled = true;
    button.setAttribute('aria-busy', 'true');

    try {
      const payload = await post({
        action: config.action,
        nonce: config.nonce,
        product_id: productId,
      });

      if (payload && payload.success) {
        const data = payload.data || {};
        updateButtons(productId, data.in_compare, data.button_text);
        setCount(data.count);
        announce(data.message || '');
        document.querySelectorAll('[data-versus-compare-error]').forEach((stale) => stale.remove());

        // If we're on the comparison page, the table no longer matches the
        // stored set after a remove, refresh so it stays in sync.
        if (data.in_compare === false && document.querySelector('.versus-compare-table')) {
          window.location.reload();
        }
      } else {
        showError((payload && payload.data && payload.data.message) || config.errorText || '', button);
      }
    } catch (error) {
      showError(config.errorText || '', button);
    } finally {
      button.disabled = false;
      button.removeAttribute('aria-busy');
    }
  });

  // "Show only differences" toggle. Honour the server-provided default and keep
  // each toggle's checked state authoritative.
  document.querySelectorAll('[data-versus-compare-differences]').forEach((checkbox) => {
    const applyVisibility = () => {
      document.querySelectorAll('.versus-compare-table tbody tr').forEach((row) => {
        row.hidden = checkbox.checked && row.dataset.different !== '1';
      });
    };

    checkbox.addEventListener('change', applyVisibility);
    applyVisibility();
  });
})();
