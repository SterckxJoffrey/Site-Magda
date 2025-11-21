(function() {
  // Récupérer la langue du navigateur et la langue stockée
  const browserLang = navigator.language.slice(0, 2);
  const savedLang = localStorage.getItem('site_lang');
  const preferredLang = savedLang || (['fr', 'pl'].includes(browserLang) ? browserLang : 'fr');

  // On récupère la langue actuelle dans l'URL (le 1er segment)
  const pathParts = window.location.pathname.split('/').filter(Boolean);
  const currentLang = pathParts.length > 0 && ['fr', 'pl'].includes(pathParts[0]) ? pathParts[0] : null;

  // if (preferredLang && preferredLang !== currentLang) {
  //   // Reconstruire le chemin sans la langue
  //   const pathWithoutLang = currentLang ? pathParts.slice(1).join('/') : pathParts.join('/');
  //   // Redirection vers la bonne langue avec le chemin
  //   window.location.replace(`/${preferredLang}/${pathWithoutLang}`);
  // }

  // Ajouter des événements sur les drapeaux pour enregistrer la langue choisie
  document.addEventListener('DOMContentLoaded', () => {
    const langSwitcher = document.querySelector('.lang-switcher');
    if (langSwitcher) {
      langSwitcher.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
          // Extraire la langue du lien href (/fr/... ou /pl/...)
          const lang = link.getAttribute('href').split('/')[1];
          localStorage.setItem('site_lang', lang);
        });
      });
    }
  });
})();