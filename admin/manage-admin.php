<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Manage Admin</h2>

    <!-- add admin -->
    <a class="btn btn-outline-primary mb-4" href="add-admin.php" role="button">Add Admin</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Username</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>
            <a href="" class="btn btn-info btn-sm mx-2">Update Admin</a>
            <a href="" class="btn btn-danger btn-sm mx-3">Remove Admin</a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td><a href="" class="btn btn-info btn-sm mx-2">Update Admin</a>
            <a href="" class="btn btn-danger btn-sm mx-3">Remove Admin</a>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry the Bird</td>
          <td>Poupe</td>
          <td><a href="" class="btn btn-info btn-sm mx-2">Update Admin</a>
            <a href="" class="btn btn-danger btn-sm mx-3">Remove Admin</a>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="clearfix"></div>
  </div>
</div>

<?php include 'inc/footer.php';
