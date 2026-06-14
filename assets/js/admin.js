/**
 * Versus — admin settings enhancement.
 *
 * Progressive enhancement for the "?" help affordances: makes each tooltip
 * toggleable by keyboard/click (it is already hover/focus-reachable via CSS),
 * wires Escape to dismiss, and closes on outside click. No dependencies.
 */
(() => {
  const init = () => {
    const toggles = document.querySelectorAll('.versus-help__toggle');

    if (toggles.length === 0) {
      return;
    }

    const closeAll = (except) => {
      document.querySelectorAll('.versus-help__tip[data-open="true"]').forEach((tip) => {
        if (tip === except) {
          return;
        }
        tip.removeAttribute('data-open');
        const owner = tip.previousElementSibling;
        if (owner) {
          owner.setAttribute('aria-expanded', 'false');
        }
      });
    };

    toggles.forEach((toggle) => {
      const tip = document.getElementById(toggle.getAttribute('aria-describedby') || '');

      if (!tip) {
        return;
      }

      toggle.setAttribute('aria-expanded', 'false');

      toggle.addEventListener('click', (event) => {
        event.preventDefault();
        const open = tip.getAttribute('data-open') === 'true';
        closeAll(open ? null : tip);
        if (open) {
          tip.removeAttribute('data-open');
          toggle.setAttribute('aria-expanded', 'false');
        } else {
          tip.setAttribute('data-open', 'true');
          toggle.setAttribute('aria-expanded', 'true');
        }
      });
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        closeAll(null);
      }
    });

    document.addEventListener('click', (event) => {
      if (!event.target.closest('.versus-help')) {
        closeAll(null);
      }
    });
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
