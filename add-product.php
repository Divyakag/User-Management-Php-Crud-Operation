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
      <button class="btn-primary btn" id="logout"> <a href="product.php?logout" class="text-white">View Products </a></button>
    </div>
  <div class="col-lg-6 m-auto">
    <form method="post"> 
        <br><br>
      <div class="card"> 
        <div class="card-header bg-dark">
          <h1 class="text-white text-center">  Add-Products </h1>
        </div><br>
        <label> Productname: </label>
        <input type="text" name="productname" class="form-control" required> <br>

        <label> Description: </label>
        <input type="text" name="description" class="form-control" required> <br>

        <label> Is Active: </label>
        <input type="text" name="isactive" class="form-control" required> <br>

        <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
      </div>

      <?php
        include 'database.php';
        if(isset($_POST['done']))
        {
          $productName = $_POST["productname"];
          $productDescription = $_POST["description"];
          $isActive = $_POST["isactive"];
          /*$query = "SELECT email from users where email ='$userEmail' ";
          $executeQuery = $conn->query($query);
          if($executeQuery->num_rows >0)
          {
            $array = $executeQuery->fetch_assoc();
            if($userEmail==isset($array['email']))
            {
              echo "<h6 style='color:red'>Email Already Exist</h6>";
              die;
            }
          }*/
          if(empty($productName))
          {
            echo "<h6 style='color:red'>Product Name is required</h6>";
          }
          else if(empty($productDescription))
          {
            echo "<h6 style='color:red'>Description is required</h6>";
          }
          else if(empty($isActive))
          {
            echo "<h6 style='color:red'>Active status is required</h6>";
          }else
          {
            
            $sql = " INSERT INTO products (`name`, `description`, `isactive`) VALUES ('$productName', '$productDescription', '$isActive')";

            if (!$conn->query($sql))
            {
              die('Error: ' . $conn->error);
            }
              header('location:product.php');
              exit();
          }
        }
      ?>
    </form>
  </div>
</body>
</html>
