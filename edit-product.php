<?php
  include 'database.php';
  $id = $_GET['id'];
  $details = "SELECT * from products where id='$id'";
  $d_result = $conn->query($details);
  $details_result = $d_result->fetch_assoc();
  $name = $details_result['name'];
  $description = $details_result['description'];
  $isactive = $details_result['isactive'];
?>
<!DOCTYPE html>
<html>
  <head>
 <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class ="col-lg-7 text-center"><br>
      <button class="btn-primary btn" id="logout"> <a href="dashboard.php?logout" class="text-white">View User </a></button><br><br>
      <button class="btn-primary btn" id="logout"> <a href="product.php?logout" class="text-white">View Products </a></button><br>
    </div>
    <div class="col-lg-6 m-auto">
      <form method="post"><br><br>
        <div class="card">
          <div class="card-header bg-dark">
            <h1 class="text-white text-center"> Update  Details </h1>
          </div><br>
          <label> Productname: </label>
          <input type="text" name="productname" class="form-control"> <br>

          <label> Description: </label>
          <input type="text" name="description" class="form-control"> <br>

          <label> Is Active: </label>
          <input type="text" name="isactive" class="form-control"> <br>

          <button class="btn btn-success" type="submit" name="done" > Submit </button><br>
        </div>
      </form>
    </div>
  </body>
</html>
<?php
  include 'database.php';
  if(isset($_POST['done']))
  {
    $id = $_GET['id'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $isactive = $_POST['isactive'];
    $q = " UPDATE `products` SET `name` = '$productname', `description` = '$description', `isactive` = '$isactive' WHERE `products`.`id` = $id ";
    $query = mysqli_query($conn,$q);
    header('location:dashboard.php');
  }
?>
