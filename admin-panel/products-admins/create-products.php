<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  if(isset($_POST['submit'])){

    if(empty($_POST['name']) OR empty($_POST['price']) OR empty($_FILES['image']['name']) OR empty($_POST['description'])
    OR empty($_POST['type'])){
      echo "<script>alert('One or more input fields are empty!');</script>";
  }
  else{
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    // Process image upload
    $targetDir = "images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    $insert = $conn->prepare("INSERT INTO products (name, image, description, price, type) VALUES (:name, :image, :description, :price, :type)");
  
    $insert->execute([
      ':name' => $name,
      ':image' => $image,
      ':description' => $description,
      ':price' => $price,
      ':type' => $type,
    ]);

    echo "<script>alert('Product added successfully!');</script>";
    echo "<script>window.location.href='show-products.php';</script>";
    
  }
}

?>

    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title mb-5 d-inline">Create Product</h3>

          <form method="POST" action="create-products.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Product name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="number" name="price" id="form2Example1" class="form-control" placeholder="Product price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Product Description</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
               
                <div class="form-outline mb-4 mt-4">

                  <select name="type" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Product Type</option>
                    <option value="Drink">Drink</option>
                    <option value="Dessert">Dessert</option>
                  </select>
                </div>
              
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          </form>

            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layouts/footer.php" ?>