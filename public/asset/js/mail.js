
  const emailUser = "mail";
  const emailDomain = "mail.be";
  const emailFull = `${emailUser}@${emailDomain}`;
  const mailto = `mailto:${emailFull}`;

  document.getElementById("email-link").innerHTML = 
    `<a href="${mailto}">${emailFull}</a>`;

