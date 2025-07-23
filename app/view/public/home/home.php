<body class="home-page">
<section class="hero-section">
  <h1>Magdalena Tyminska</h1>
  <h2>
    <?=$t['hero_h2'] ?>
  </h2>
  <p> 
   <?=$t['hero_p1'] ?>
  </p>
  <p>
    <?=$t['hero_p2'] ?>
  </p>
  <a href="/contact" rel="noopener noreferrer">
    <?=$t['hero_CTO'] ?>
  </a>
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
      <p>Av. Louise 230/6, 1050 Bruxelles</p>
    </div>
    <div class="phone">
      <p>Téléphone : </p>
      <p>+32 2 467 890 125</p>
    </div>
    <div>
      <p>Email : </p>
      <p>mail@mail.be</p>
    </div>
    <div>
      <p>Infos pratiques : </p>
      <p>Regarde sur Maps zebi</p>
    </div>
  </section>
</div>

</body>

