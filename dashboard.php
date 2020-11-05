<?php
  session_start();
  if(isset($_SESSION['email']))
  if(isset($_SESSION['id']))
  if(isset($_SESSION['name']))
  {}
  else
  { 
    if(!isset($_SESSION['email']))
    {
      header("location:login.php");
    }
  }

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
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class ="col-lg-12 jumbotron text-center">
      <h1 class="text-body text-center " ><?php echo  ' hello!! ' . $_SESSION['name'].'<br/>'; ?></h1>
      <button class="btn-danger btn" id="logout"> <a href="logout.php?logout" class="text-white">Logout</a></button>
    </div>
    <div class="container">
      <div class="col-lg-12"><br>
        <h5 class="text-warning text-center" > Display Table Data </h5><br>
        <button class="btn-primary btn"> <a href="add-user.php" class="text-white"> Add User </a> </button><br><br>
        <table  id="tabledata" class=" table table-striped table-hover table-bordered">
          <tr class="bg-dark text-white text-center">
            <th> User Id</th>
            <th> Username </th>
            <th> Email </th>
            <th> Created At </th>
            <th> Updated At </th>
            <th> Action </th>
          </tr >
          <?php
              include 'database.php'; 
              $q = "select * from users";
              $query = mysqli_query($conn,$q);
              while($res = mysqli_fetch_array($query))
            { $dbId=$res['id'];
              $dbName=$res['name'];
              $dbEmail=$res['email'];
              $dbCreatedAt=$res['created_at'];
              $dbUpdatedAt=$res['updated_at'];
              $u_Email = $_SESSION['email'];
              if(($u_Email == $dbEmail))
              {
                $flag ="pointer-events:none;";
              }
          ?>
                <tr class="text-center">
                  <td> <?php echo $dbId; ?> </td>
                  <td> <?php echo $dbName; ?> </td>
                  <td> <?php echo $dbEmail; ?> </td>
                  <td> <?php echo $dbCreatedAt; ?> </td>
                  <td> <?php echo $dbUpdatedAt; ?> </td>
                  <td> <a href="edit-user.php?id=<?php echo $dbId; ?>" class="text-white btn-primary btn" onclick="update()"> Edit </a>&nbsp
                       <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white btn-danger btn" onclick=" deleted()"> Delete </a></td>
                </tr>
          <?php 
            }
          ?>
        </table>  
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $('#tabledata').DataTable();
      }) 
      function update() {
        alert("Updated Parmanently");
      }
      function deleted() {
        alert("Delete Parmanently");
      }
      
    </script>
  </body>
</html>