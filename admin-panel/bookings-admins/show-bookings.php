
<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $bookings = $conn->query("SELECT * FROM bookings");
  $bookings->execute();

  $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>

  <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title mb-4 d-inline">Bookings</h3>
            
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">First_name</th>
                    <th scope="col">Last_name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Update Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allBookings as $bookings): ?>
                  <tr>
                    <td><?php echo $bookings->first_name; ?></td>
                    <td><?php echo $bookings->last_name; ?></td>
                    <td><?php echo $bookings->date; ?></td>
                    <td><?php echo $bookings->time; ?></td>
                    <td><?php echo $bookings->phone; ?></td>
                    <td><?php echo $bookings->message; ?></td>
                    <td><?php echo $bookings->status; ?></td>
                    <td><?php echo $bookings->user_id; ?></td>
                    <td><?php echo $bookings->created_at; ?></td>
                    <td><a href="change-booking-status.php?id=<?php echo $bookings->id; ?>" class="btn btn-warning text-center ">Update</a></td>
                    <td><a href="delete-bookings.php?id=<?php echo $bookings->id; ?>" class="btn btn-danger text-center ">Delete</a></td>
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