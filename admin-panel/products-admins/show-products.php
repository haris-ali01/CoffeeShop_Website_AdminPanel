<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $products = $conn->query("SELECT * FROM products");
  $products->execute();
  $allProducts = $products->fetchAll(PDO::FETCH_OBJ);


?>

  <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-4 d-inline">Foods</h4>
              <a  href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product image</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Product type</th>
                    <th scope="col">Delete product</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allProducts as $products): ?>
                  <tr>
                     <th scope="row"><?php echo $products->id; ?></th>
                     <td><?php echo $products->name; ?></td>
                     <td><img style="width: 50px; height: 50px;" src="images/<?php echo $products->image; ?>"></td>
                     <td>$<?php echo $products->price; ?></td>
                     <td><?php echo $products->type; ?></td>
                     <td><a href="delete-products.php?id=<?php echo $products->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layouts/footer.php" ?>