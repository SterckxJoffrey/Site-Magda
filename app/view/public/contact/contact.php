<body class="contact_page">
<div class="contact-wrapper">
<section class="contact">
  <h2><?=$t['contact_h2'] ?></h2>

  <?php if (isset($_GET['status'])): ?>
    <div class="message <?= $_GET['status'] === 'success' ? 'success' : 'error' ?>">
      <?php if ($_GET['status'] === 'success'): ?>
        <?=$t['contact_success'] ?>
      <?php else: ?>
        <?=$t['contact_error'] ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

<form class="contact_form" method="POST" action="/<?= $lang ?>/contact/send">
  <input type="hidden" name="origin" value="contact"> <!-- sur la page contact -->

  <input type="text" name="name" id="name" placeholder="<?= $t['contact_name'] ?>" required>
  <input type="email" name="email" id="email" placeholder="<?= $t['contact_email'] ?>" required>
  <textarea name="message" id="message" placeholder="<?= $t['contact_message'] ?>" required></textarea>
  <button type="submit"><?= $t['contact_button'] ?></button>
</form>

</section>


<section class="contact-info">
    <h2><?= $t['contact_title'] ?></h2>
    <div>
        <p class="info-label"><?= $t['contact_address_label'] ?></p>
        <p><?= $t['contact_address'] ?></p>
                <p><?= $t['contact_town'] ?></p>

    </div>
    <div>
        <p class="info-label"><?= $t['contact_phone_label'] ?></p>
        <p id="phone-link"></p>
    </div>
    <div>
        <p class="info-label"><?= $t['contact_email_label'] ?></p>
        <p id="email-link"></p>
    </div>
    <div>
        <p class="info-label"><?= $t['contact_info_label'] ?></p>
        <p class="info"><?= $t['contact_info_text'] ?></p>
    </div>
</section>
</div>
<script src="/asset/js/mail.js" defer></script>
<script src="/asset/js/phone.js" defer></script>
</body>
