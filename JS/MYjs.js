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
