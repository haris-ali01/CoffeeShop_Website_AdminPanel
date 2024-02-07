
<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  $admins = $conn->query("SELECT * FROM admins");
  $admins->execute();
  $allAdmins = $admins->fetchAll(PDO::FETCH_OBJ);

?>

  <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; foreach($allAdmins as $admins) { ?>
                <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?php echo $admins->admin_name; ?></td> 
                  <td><?php echo $admins->email; ?></td>
                </tr>
                  <?php
                    $count++;} ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layouts/footer.php" ?>