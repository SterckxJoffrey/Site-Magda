// contact-info.js
document.addEventListener("DOMContentLoaded", () => {
  // Email
  const emailUser = "Magdalena.tyminska";
  const emailDomain = "avocat.be";
  const emailFull = `${emailUser}@${emailDomain}`;
  const mailto = `mailto:${emailFull}`;

  const emailLinkEl = document.getElementById("emaillink");
  if (emailLinkEl) {
    emailLinkEl.innerHTML = `<a href="${mailto}">${emailFull}</a>`;
  }

  // Téléphone
  const phoneNumber = "+32 494 99 58 18"; // Remplace par le vrai numéro
  const telLink = `tel:${phoneNumber.replace(/\s+/g, '')}`;

  const phoneLinkEl = document.getElementById("phonelink");
  if (phoneLinkEl) {
    phoneLinkEl.innerHTML = `<a href="${telLink}">${phoneNumber}</a>`;
  }
});
