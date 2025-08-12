
  const emailUser = "Magdalena.tyminska";
  const emailDomain = "avocat.be";
  const emailFull = `${emailUser}@${emailDomain}`;
  const mailto = `mailto:${emailFull}`;

  document.getElementById("email-link").innerHTML = 
    `<a href="${mailto}">${emailFull}</a>`;

