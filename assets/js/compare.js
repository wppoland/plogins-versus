/**
 * Versus — storefront comparison behaviour.
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

    if (!response.ok) {
      throw new Error(`HTTP ${response.status}`);
    }

    return response.json();
  };

  document.addEventListener('click', async (event) => {
    const clearButton = event.target.closest('[data-versus-compare-clear]');

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
          announce((payload && payload.data && payload.data.message) || config.errorText || '');
          clearButton.removeAttribute('aria-busy');
        }
      } catch (error) {
        announce(config.errorText || '');
        clearButton.removeAttribute('aria-busy');
      }

      return;
    }

    const button = event.target.closest('[data-versus-compare-button]');

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

        // If we're on the comparison page, the table no longer matches the
        // stored set after a remove — refresh so it stays in sync.
        if (data.in_compare === false && document.querySelector('.versus-compare-table')) {
          window.location.reload();
        }
      } else {
        announce((payload && payload.data && payload.data.message) || config.errorText || '');
      }
    } catch (error) {
      announce(config.errorText || '');
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
