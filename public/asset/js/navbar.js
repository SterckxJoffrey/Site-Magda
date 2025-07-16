const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
const navbar = document.querySelector('.navbar');
const logoLink = document.querySelector('.logo');
const logoImg = logoLink.querySelector('img');
const bars = document.querySelectorAll('.bar');
const links = document.querySelectorAll('.nav-links li a');
const body = document.body;

// Gestion du menu burger
burger.addEventListener('click', () => {
  const expanded = burger.getAttribute('aria-expanded') === 'true';
  burger.setAttribute('aria-expanded', String(!expanded));
  navLinks.classList.toggle('open');
  body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
});

// Fermer le menu si clic en dehors (mobile uniquement)
document.addEventListener('click', (e) => {
  const isClickInsideMenu = navLinks.contains(e.target);
  const isClickOnBurger = burger.contains(e.target);

  if (!isClickInsideMenu && !isClickOnBurger && navLinks.classList.contains('open')) {
    navLinks.classList.remove('open');
    burger.setAttribute('aria-expanded', 'false');
    body.style.overflow = '';
  }
});

// Fermer le menu au clic sur un lien
links.forEach(link => {
  link.addEventListener('click', () => {
    if (navLinks.classList.contains('open')) {
      navLinks.classList.remove('open');
      burger.setAttribute('aria-expanded', 'false');
      body.style.overflow = '';
    }
  });
});

// Ajout d'une classe .scrolled au <body> au scroll
window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    body.classList.add('scrolled');
  } else {
    body.classList.remove('scrolled');
  }
});
