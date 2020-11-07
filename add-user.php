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
    <form method="post"> 
        <br><br>
      <div class="card"> 
        <div class="card-header bg-dark">
          <h1 class="text-white text-center">  Add-User </h1>
        </div><br>
        <label> Username: </label>
        <input type="text" name="username" class="form-control" required> <br>

        <label> Email: </label>
        <input type="email" name="email" class="form-control" required> <br>

        <label> Password: </label>
        <input type="password" name="password" class="form-control" required> <br>

        <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
      </div>

      <?php
        include 'database.php';
        if(isset($_POST['done']))
        {
          $userName = $_POST["username"];
          $userEmail = $_POST["email"];
          $userPassword = $_POST["password"];
          $query = "SELECT email from users where email ='$userEmail' ";
          $executeQuery = $conn->query($query);
          if($executeQuery->num_rows >0)
          {
            $array = $executeQuery->fetch_assoc();
            if($userEmail==isset($array['email']))
            {
              echo "<h6 style='color:red'>Email Already Exist</h6>";
              die;
            }
          }
          if(empty($userName))
          {
            echo "<h6 style='color:red'>User Name is required</h6>";
          }
          else if(empty($userEmail))
          {
            echo "<h6 style='color:red'>Email is required</h6>";
          }
          else if(empty($userPassword))
          {
            echo "<h6 style='color:red'>Password is required</h6>";
          }else
          {
            $date = date("Y-m-d H:i:s");
            $sql = " INSERT INTO users (`name`, `email`, `password`) VALUES ('$userName', '$userEmail', '$userPassword')";

            if (!$conn->query($sql))
            {
              die('Error: ' . $conn->error);
            }
              header('location:dashboard.php');
              exit();
          }
        }
      ?>
    </form>
  </div>
</body>
</html>
