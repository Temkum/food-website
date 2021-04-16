<?php include 'include/navbar.php'; ?>

<section class="form" id="signup">
  <div class="row">
    <h2>We're happy to hear from you</h2>
  </div>

  <div class="row">
    <form action="" method="POST" class="contact-form">
      <div class="row">
        <div class="col span-1-of-3">
          <label for="name">Name</label>
        </div>
        <div class="col span-2-of-3">
          <input type="text" name="name" id="name" placeholder="Enter your name" required>
        </div>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <label for="email">Email</label>
        </div>
        <div class="col span-2-of-3">
          <input type="email" name="email" id="email" placeholder="Enter email" required>
        </div>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <label for="find-us">How did you find us?</label>
        </div>
        <div class="col span-2-of-3">
          <select name="find-us" id="find-us">
            <option value="friends" selected>Friend</option>
            <option value="search">Search engine</option>
            <option value="ad">Ads</option>
            <option value="other">Other</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col span-1-of-3">
          <label>Newsletter</label>
        </div>
        <div class="col span-2-of-3">
          <input type="checkbox" name="news" id="news" checked> Yes, please
        </div>
      </div>

      <div class="row">
        <div class="col span-1-of-3">
          <label>Drop us a line</label>
        </div>
        <div class="col span-2-of-3">
          <textarea name="message" placeholder="Your message"></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col span-1-of-3">
          <label>&nbsp;</label>
        </div>
        <div class="col span-2-of-3">
          <input type="submit" value="Send"></textarea>
        </div>
      </div>
    </form>
  </div>
</section>

<?php include 'include/footer.php'; ?>