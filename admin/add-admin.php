<?php include 'inc/topbar.php'; ?>
<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Add Admin</h2>
    <br>

    <form action="" method="post">
      <div class="input-group mb-3" class="col">
        <span class="input-group-text" id="basic-addon1">Full name</span>
        <input type="text" class="form-control" placeholder="Enter your name" aria-label="Name"
          aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Username</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
          aria-describedby="basic-addon1">
      </div>

      <div class="mb-3 input-group">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password">
      </div>


      <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-3">Confirm identity</button>
      </div>
    </form>
    <div class="clearfix"></div>
  </div>
</div>
<?php include 'inc/footer.php';

