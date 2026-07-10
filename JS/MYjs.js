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
