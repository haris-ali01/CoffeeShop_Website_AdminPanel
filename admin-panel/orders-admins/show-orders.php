
<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  //get orders
  $orders = $conn->query("SELECT * FROM orders");
  $orders->execute();

  $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);

?>


  <div class="container-fluid">

    <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title mb-5 d-inline">Orders</h3>
            
            <?php if(count($allOrders) > 0) : ?>
              <table class="table mt-4">
                <thead>
                  <tr>
                  <th>First name</th>
								  <th>Last name</th>
                  <th>Country</th>
								  <th>Address</th>
								  <th>City</th>
								  <th>Zip</th>
								  <th>Phone</th>
								  <th>Total Price</th>
								  <th>Status</th>
								  <th>Update status</th>
                  <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($allOrders as $orders): ?>
                  <tr>
                    <td><?php echo $orders->first_name; ?></td>
                    <td><?php echo $orders->last_name; ?></td>
                    <td><?php echo $orders->country; ?></td>
                    <td><?php echo $orders->street_address; ?></td>
                    <td><?php echo $orders->city; ?></td>
                    <td><?php echo $orders->zip_code; ?></td>
                    <td><?php echo $orders->phone; ?></td>
                    <td>$<?php echo $orders->total_price; ?></td>
                    <td><?php echo $orders->status; ?></td>
                    <td><a href="change-status.php?id=<?php echo $orders->id; ?>" class="btn btn-warning text-center ">Update</a></td>
                    <td><a href="delete-orders.php?id=<?php echo $orders->id; ?>" class="btn btn-danger text-center ">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 

            <?php else : ?>
						  <div class="alert alert-danger mt-3" role="alert">You do not have any orders now.</div>
					 <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layouts/footer.php" ?>