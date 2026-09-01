/* Tanečné štúdio DANCY – lightweight enhancements
   (navigation, scrollspy). Modals & collapse are handled by Bootstrap. */

document.addEventListener('DOMContentLoaded', function () {
  const navbar = document.getElementById('mainNav');

  // Close the mobile menu after tapping a nav link
  if (navbar) {
    navbar.querySelectorAll('.nav-link, .navbar-brand').forEach(function (link) {
      link.addEventListener('click', function () {
        const open = bootstrap.Collapse.getInstance(navbar);
        if (open && navbar.classList.contains('show')) {
          open.hide();
        }
      });
    });
  }

  // Highlight the active section in the navbar while scrolling
  if (window.bootstrap && bootstrap.ScrollSpy) {
    new bootstrap.ScrollSpy(document.body, {
      target: '#mainNav',
      rootMargin: '0px 0px -55%',
    });
  }

  // Novinky: poster click opens the lightbox carousel instead of a new tab
  // (the href stays as a no-JS fallback)
  const lightboxEl = document.getElementById('modalNovinky');
  const carouselEl = document.getElementById('carouselNovinky');
  if (lightboxEl && carouselEl && window.bootstrap) {
    const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
    const lightbox = bootstrap.Modal.getOrCreateInstance(lightboxEl);

    document.querySelectorAll('.news-card').forEach(function (card, index) {
      card.addEventListener('click', function (e) {
        e.preventDefault();
        carousel.to(index);
        lightbox.show();
      });
    });

    // Arrow keys switch posters even when the carousel isn't focused
    lightboxEl.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowLeft') carousel.prev();
      if (e.key === 'ArrowRight') carousel.next();
    });
  }

  // "Rozvrh" button in the offer modals: close the modal, scroll to the
  // schedule and highlight the group's slots with a pulsing gradient ring.
  // (Closing is done here because Bootstrap treats data-bs-dismiss on an
  // anchor with an href as a target selector and the link would do nothing.)
  let slotHighlightTimer = null;
  document.querySelectorAll('.modal a[href="#rozvrh"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();

      if (slotHighlightTimer) window.clearTimeout(slotHighlightTimer);
      document.querySelectorAll('.slot--highlight').forEach(function (slot) {
        slot.classList.remove('slot--highlight');
      });
      const group = link.getAttribute('data-group');
      const slots = group
        ? document.querySelectorAll('.slot[data-group="' + group + '"]')
        : [];
      slots.forEach(function (slot) {
        void slot.offsetWidth; // restart the pulse animation on repeat clicks
        slot.classList.add('slot--highlight');
      });
      if (slots.length) {
        slotHighlightTimer = window.setTimeout(function () {
          slots.forEach(function (slot) {
            slot.classList.remove('slot--highlight');
          });
        }, 8000);
      }

      const goToSchedule = function () {
        document.getElementById('rozvrh').scrollIntoView({ behavior: 'smooth' });
      };
      const modalEl = link.closest('.modal');
      if (modalEl && window.bootstrap) {
        modalEl.addEventListener('hidden.bs.modal', goToSchedule, { once: true });
        bootstrap.Modal.getOrCreateInstance(modalEl).hide();
      } else {
        goToSchedule();
      }
    });
  });

  // Sign-up form links inside the modals open in a new tab; close the modal
  // so the page is ready when the visitor comes back
  document.querySelectorAll('.modal a[target="_blank"]').forEach(function (link) {
    link.addEventListener('click', function () {
      const modalEl = link.closest('.modal');
      if (modalEl && window.bootstrap) {
        bootstrap.Modal.getOrCreateInstance(modalEl).hide();
      }
    });
  });

  // Allow keyboard activation (Enter / Space) of the clickable offer cards
  document.querySelectorAll('.offer-card[role="button"]').forEach(function (card) {
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        card.click();
      }
    });
  });
});
