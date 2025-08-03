<body class="contact_page">
<div class="contact-wrapper">
  <section class="contact">
    <h2><?=$t['contact_h2'] ?></h2>
    <form class="contact_form" method="POST" action="contact.php">
      <input type="text" name="name" id="name" placeholder="Nom" required>
      <input type="email" name="email" id="email" placeholder="Email" required>
      <textarea name="message" id="message" placeholder="Votre message..." required></textarea>
      <button type="submit"><?=$t['contact_button'] ?></button>
    </form>
  </section>

  <section class="contact-info">
    <h2>Contact</h2>
    <div>
      <p class="info-label">Adresse :</p>
      <p>Av. Louise 230/6, 1050 Bruxelles</p>
    </div>
    <div>
      <p class="info-label">Téléphone :</p>
      <p>+32 2 467 890 125</p>
    </div>
    <div>
      <p class="info-label">Email :</p>
      <p>mail@mail.be</p>
    </div>
    <div>
      <p class="info-label">Infos pratiques :</p>
      <p>Regarde sur Maps zebi</p>
    </div>
  </section>
</div>

</body>
