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
  document.body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
});

// Ajout d'une classe .scrolled au <body> au scroll
window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    body.classList.add('scrolled');
  } else {
    body.classList.remove('scrolled');
  }
});
