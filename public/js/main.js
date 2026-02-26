/**
 * main.js — JavaScript del tema FSS Hugo
 * Menú hamburguesa · smooth scroll · animaciones al scroll
 */

(function () {
  'use strict';

  // ── Menú hamburguesa ───────────────────────────────────────
  const menuToggle = document.querySelector('.menu-toggle');
  const nav        = document.querySelector('#main-nav');

  if (menuToggle && nav) {
    menuToggle.addEventListener('click', () => {
      const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.classList.toggle('active');
      nav.classList.toggle('active');
      menuToggle.setAttribute('aria-expanded', String(!expanded));
      menuToggle.setAttribute(
        'aria-label',
        expanded ? 'Abrir menú de navegación' : 'Cerrar menú de navegación'
      );
    });

    // Cerrar al hacer clic en un enlace
    nav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        menuToggle.classList.remove('active');
        nav.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Cerrar al hacer clic fuera
    document.addEventListener('click', e => {
      if (!nav.contains(e.target) && !menuToggle.contains(e.target)) {
        menuToggle.classList.remove('active');
        nav.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // ── Smooth scroll para anclas internas ─────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── Animación fade-in al scroll (IntersectionObserver) ─────
  const animatables = document.querySelectorAll(
    '.service-card, .benefit-card, .step, .faq-item, .blog-card, .list-card'
  );

  if ('IntersectionObserver' in window && animatables.length) {
    // Estado inicial
    animatables.forEach(el => {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    const observer = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity   = '1';
            entry.target.style.transform = 'translateY(0)';
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
    );

    animatables.forEach(el => observer.observe(el));
  }

})();
