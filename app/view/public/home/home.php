<body class="home-page">
<section class="hero-section">
  <div class="hero-content">
    <h1>Magdalena Tyminska</h1>
    <h2>
        <?=$t['hero_h2'] ?>
    </h2>

    <div class="hero-icons">
      <div class="icon">
        <img src="/asset/img/house-big.svg" alt="Droit de la famille">
        <p><?=$t['domain_famille']?></p>
      </div>

      <div class="icon">
        <img src="/asset/img/buidling-big.svg" alt="Droit immobilier">
        <p><?=$t['domain_immobilier']?></p>
      </div>

      <div class="icon">
        <img src="/asset/img/car-big.svg" alt="Droit routier">
        <p><?=$t['domain_routier']?></p>
      </div>

      <div class="icon">
        <img src="/asset/img/child-big.svg" alt="Droit jeunesse">
        <p><?=$t['domain_jeunesse']?></p>
      </div>
    </div>

    <p><?=$t['hero_paragraph']?></p>

    <a href="/contact" rel="noopener noreferrer"><?=$t['nav_contact']?></a>
  </div>
</section>



<section class="description">
<h2>
  <?=$t['description_h2'] ?>
</h2>
<div class="description_content">
  <div class="image-container">
<img src="/asset/img/photo.jpeg" alt="image de moi">
  </div>
    <div class="text-container">
<p>
  <?=$t['description_p1'] ?>
</p>
<p>
  <?=$t['description_p2'] ?>
</p>
<p>
  <?=$t['description_p3'] ?>
</p>
<p>
  <?=$t['description_p4'] ?>
</p>
</div>
</div>
</section>

<section class="domain">
  <h2>
    <?=$t['domain_h2'] ?>
  </h2>
  <ul class="domain-grid">
    <li>
      <h3>
        <?=$t['domain_h3_1'] ?>
      </h3>
      <p>
        <?=$t['domain_p1_1'] ?>
      </p>
      <ul>
        <li>
          <?=$t['domain_li1_1'] ?>
        </li>
        <li>
          <?=$t['domain_li1_2'] ?>
        </li>
        <li>
          <?=$t['domain_li1_3'] ?>
        </li>
        <li>
          <?=$t['domain_li1_4'] ?>
        </li>
        <li>
          <?=$t['domain_li1_5'] ?>
      </li>
        <li>
          <?=$t['domain_li1_6'] ?>
        </li>
      </ul>
      <p>
        <?=$t['domain_p2_1'] ?>
      </p>
    </li>

    <li>
      <h3>
        <?=$t['domain_h3_2'] ?>
      </h3>
      <p>
        <?=$t['domain_p1_2'] ?>
      </p>
      <ul>
        <li><?=$t['domain_li2_1'] ?></li>
        <li><?=$t['domain_li2_2'] ?></li>
        <li><?=$t['domain_li2_3'] ?></li>
        <li><?=$t['domain_li2_4'] ?></li>
        <li><?=$t['domain_li2_5'] ?></li>
      </ul>
      <p><?=$t['domain_p2_2'] ?></p>
    </li>

    <li>
      <h3><?=$t['domain_h3_3'] ?></h3>
      <p>  <?=$t['domain_p1_3'] ?></p>
      <ul>
        <li>  <?=$t['domain_li3_1'] ?></li>
        <li><?=$t['domain_li3_2'] ?></li>
        <li><?=$t['domain_li3_3'] ?></li>
        <li><?=$t['domain_li3_4'] ?></li>
        <li><?=$t['domain_li3_5'] ?></li>
      </ul>
      <p><?=$t['domain_p2_3'] ?></p>
    </li>

    <li>
      <h3> <?=$t['domain_h3_4'] ?></h3>
      <p><?=$t['domain_p1_4'] ?></p>
      <ul>
        <li><?=$t['domain_li4_1'] ?></li>
        <li><?=$t['domain_li4_2'] ?></li>
        <li><?=$t['domain_li4_3'] ?></li>
        <li><?=$t['domain_li4_4'] ?></li>
        <li><?=$t['domain_li4_5'] ?></li>
      </ul>
      <p><?=$t['domain_p2_4'] ?></p>
    </li>
  </ul>
</section>


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

<form class="contact_form" id="contact_form" method="POST" action="/<?= $lang ?>/contact/send">
  <input type="hidden" name="origin" value="home">
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

