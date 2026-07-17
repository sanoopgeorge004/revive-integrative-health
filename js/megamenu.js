/**
 * Services mega menu
 * Desktop: open on hover / focus within; click navigates to Services
 * Mobile: first click opens panel; second click (or link inside) navigates
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
  var closeTimer = null;

  function isDesktop() {
    return desktopQuery.matches;
  }

  function openMega() {
    clearTimeout(closeTimer);
    item.classList.add('is-open');
    trigger.setAttribute('aria-expanded', 'true');
  }

  function closeMega() {
    item.classList.remove('is-open');
    trigger.setAttribute('aria-expanded', 'false');
  }

  function scheduleClose() {
    clearTimeout(closeTimer);
    closeTimer = setTimeout(function () {
      closeMega();
    }, 150);
  }

  function closeOffcanvas() {
    var offcanvasEl = document.getElementById('site-navigation');
    if (!offcanvasEl || typeof bootstrap === 'undefined' || !bootstrap.Offcanvas) {
      return;
    }
    var instance = bootstrap.Offcanvas.getInstance(offcanvasEl);
    if (instance) {
      instance.hide();
    }
  }

  function isNavigableHref(href) {
    if (!href) {
      return false;
    }
    var value = href.trim();
    return value !== '' && value !== '#' && value.indexOf('javascript:') !== 0;
  }

  // Mobile: open on first tap; second tap navigates to Services.
  // Desktop: never block — click goes to the Services page.
  trigger.addEventListener('click', function (event) {
    if (isDesktop()) {
      return;
    }

    if (!item.classList.contains('is-open')) {
      event.preventDefault();
      openMega();
      return;
    }

    closeOffcanvas();
    closeMega();
  });

  // Close mobile offcanvas when following mega / other nav links.
  // Avoids Bootstrap data-bs-dismiss sometimes blocking navigation.
  var navRoot = document.querySelector('.site-header__nav');
  if (navRoot) {
    navRoot.addEventListener('click', function (event) {
      var link = event.target.closest('a[href]');
      if (!link || !navRoot.contains(link) || link === trigger) {
        return;
      }

      if (!isNavigableHref(link.getAttribute('href'))) {
        event.preventDefault();
        return;
      }

      if (!isDesktop()) {
        closeOffcanvas();
      }
      closeMega();
    });
  }

  item.addEventListener('mouseenter', function () {
    if (isDesktop()) {
      clearTimeout(closeTimer);
      openMega();
    }
  });

  item.addEventListener('mouseleave', function () {
    if (isDesktop()) {
      scheduleClose();
    }
  });

  panel.addEventListener('mouseenter', function () {
    if (isDesktop()) {
      clearTimeout(closeTimer);
      openMega();
    }
  });

  panel.addEventListener('mouseleave', function () {
    if (isDesktop()) {
      scheduleClose();
    }
  });

  item.addEventListener('focusin', function () {
    if (isDesktop()) {
      clearTimeout(closeTimer);
      openMega();
    }
  });

  item.addEventListener('focusout', function (event) {
    if (isDesktop() && !item.contains(event.relatedTarget)) {
      scheduleClose();
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
