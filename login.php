<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title></title>
    </head>
    <body style="background:#CCC;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card bg-dark mt-5">
                        <div class="card-title text-white mt-5">
                            <h3 class="text-center py-3">Login Form </h3>
                        </div>
                        <div class="card-body">
                            <!--create form-->
                            <form action="" method="post">
                                <input type="email" name="email" placeholder=" Enter your email" class="form-control mb-3" required>
                                <input type="password" name="password" placeholder="Password" class="form-control mb-3"required>
                                <button class="btn btn-success mt-3" name="login" type="submit">Login</button>
                                <!--check if given email and password is match with stored data base than go to dashboard-->
                                <?php 
                                    session_start();
                                    if(isset($_POST['login']))
                                    { 
                                        if(empty($_POST['email']) || empty($_POST['password']))
                                        {
                                            echo "<h6 style='color:red'>Please enter fields</h6>";
                                        }
                                        else
                                        {   include 'database.php';
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $query="SELECT * from users where email='".$email."' and password='".$password."'";
                                            $result=mysqli_query($conn,$query);
                                            if ($result->num_rows > 0) 
                                            {
                                                $row = mysqli_fetch_assoc($result);
                                                $_SESSION['name'] = $row['name'];
                                                $_SESSION['id'] = $row['id'];
                                                $_SESSION['sEmail'] = $row['email'];
                                                $_SESSION['email'] = $_POST['email'];
                                                header("location:dashboard.php");
                                            }
                                            else
                                            {
                                                echo "<h6 style='color:red'>Invalid Email and Password</h6>";
                                            }
                                        }
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
