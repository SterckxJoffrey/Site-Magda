const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
const navbar = document.querySelector('.navbar');
const logoLink = document.querySelector('.logo');
const logoImg = logoLink.querySelector('img');
const bars = document.querySelectorAll('.bar');
const links = document.querySelectorAll('.nav-links li a');

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
    navLinks.style.backgroundColor = '#ffffff';
    bars.forEach(bar => {
      bar.style.backgroundColor = '#c6Ac92';
    });
    links.forEach(link => {
      link.style.color = 'black';
    });
    // logoImg.src = '/asset/img/logo.png';
  } else {
    navbar.style.backgroundColor = 'transparent';
    navLinks.style.backgroundColor = 'transparent';
    bars.forEach(bar => {
      bar.style.backgroundColor = 'white';
    });
    links.forEach(link => {
      link.style.color = 'white';
    });
    // logoImg.src = '/asset/img/logo_black.png';
  }
});


