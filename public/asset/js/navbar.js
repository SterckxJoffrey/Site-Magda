const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
const navbar = document.querySelector('.navbar');
const logoLink = document.querySelector('.logo');
const logoImg = logoLink.querySelector('img');
const bars = document.querySelectorAll('.bar');  // <-- querySelectorAll pour tous les .bar

// Gestion du menu burger
burger.addEventListener('click', () => {
  const expanded = burger.getAttribute('aria-expanded') === 'true';
  burger.setAttribute('aria-expanded', String(!expanded));
  navLinks.classList.toggle('open');
  document.body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
});

// Changement de navbar au scroll
window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    navbar.style.backgroundColor = '#ffffff'; 
    bars.forEach(bar => {
      bar.style.backgroundColor = '#c6Ac92';  // <-- backgroundColor, pas color
    });
    // logoImg.src = '/asset/img/logo.png';
  } else {
    navbar.style.backgroundColor = 'transparent';
    bars.forEach(bar => {
      bar.style.backgroundColor = 'white';  // Revenir à la couleur initiale
    });
    // logoImg.src = '/asset/img/logo_black.png';
  }
});

