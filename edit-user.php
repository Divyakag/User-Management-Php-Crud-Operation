<?php
  include 'database.php';
  $id = $_GET['id'];
  $details = "SELECT * from users where id='$id'";
  $d_result = $conn->query($details);
  $details_result = $d_result->fetch_assoc();
  $name = $details_result['name'];
  $email = $details_result['email'];
  $pass = $details_result['password'];
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
      <button class="btn-primary btn" id="logout"> <a href="dashboard.php?logout" class="text-white">View User </a></button>
    </div>
    <div class="col-lg-6 m-auto">
      <form method="post"><br><br>
        <div class="card">
          <div class="card-header bg-dark">
            <h1 class="text-white text-center"> Update  Details </h1>
          </div><br>
          <label> Username: </label>
          <input type="text" name="username" class="form-control" value="<?php echo $name;?>"> <br>

          <label> Email: </label>
          <input type="email" name="email" class="form-control" value="<?php echo $email;?>"> <br>

          <label> Password: </label>
          <input type="password" name="password" class="form-control" value="<?php echo $pass;?>"> <br>

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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $q = " UPDATE `users` SET `name` = '$username', `email` = '$email', `password` = '$password' WHERE `users`.`id` = $id ";
    $query = mysqli_query($conn,$q);
    header('location:dashboard.php');
  }
?>
