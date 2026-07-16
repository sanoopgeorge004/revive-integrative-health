/**
 * Services mega menu
 * Desktop: open on hover / focus within
 * Mobile: toggle on click
 */
(function () {
  'use strict';

  var item = document.querySelector('.site-header__mega-item');
  var trigger = document.querySelector('[data-mega-trigger]');
  var panel = document.querySelector('[data-mega-panel]');

  if (!item || !trigger || !panel) {
    return;
  }

  var desktopQuery = window.matchMedia('(min-width: 992px)');

  function isDesktop() {
    return desktopQuery.matches;
  }

  function openMega() {
    item.classList.add('is-open');
    trigger.setAttribute('aria-expanded', 'true');
  }

  function closeMega() {
    item.classList.remove('is-open');
    trigger.setAttribute('aria-expanded', 'false');
  }

  function toggleMega(event) {
    if (isDesktop()) {
      return;
    }

    event.preventDefault();

    if (item.classList.contains('is-open')) {
      closeMega();
    } else {
      openMega();
    }
  }

  trigger.addEventListener('click', toggleMega);

  item.addEventListener('mouseenter', function () {
    if (isDesktop()) {
      openMega();
    }
  });

  item.addEventListener('mouseleave', function () {
    if (isDesktop()) {
      closeMega();
    }
  });

  item.addEventListener('focusin', function () {
    if (isDesktop()) {
      openMega();
    }
  });

  item.addEventListener('focusout', function (event) {
    if (isDesktop() && !item.contains(event.relatedTarget)) {
      closeMega();
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && item.classList.contains('is-open')) {
      closeMega();
      trigger.focus();
    }
  });

  desktopQuery.addEventListener('change', closeMega);
})();
