<body class="contact_page">
<section class="contact">
  <h1>Prendre rendez-vous</h1>
  <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
  <p class="success">Votre message a bien été envoyé !</p>
<?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
  <p class="error">Une erreur est survenue, veuillez réessayer.</p>
<?php endif; ?>

<form class="contact_form" method="POST" action="/<?= $lang ?>/contact/send">

    <input type="text" name="name" id="name" placeholder="Nom" required>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <textarea name="message" id="message" placeholder="Votre message..." required></textarea>
    <button type="submit">Envoyer</button>
  </form>
</section>
</body>
