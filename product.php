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
    <div class="container">
      <div class="col-lg-12"><br>
        <h1 class="text-body text-center" > Products </h1><br>
        <button class="btn-primary btn"> <a href="add-product.php" class="text-white"> Add Product </a> </button><br><br>
        <table  id="tabledata" class=" table table-striped table-hover table-bordered">
          <tr class="bg-dark text-white text-center">
            <th> Product Id</th>
            <th> Product Name </th>
            <th> Description </th>
            <th> IS Active </th>
            <th> Created At </th>
            <th> Updated At </th>
            <th> Action </th>
          </tr >
          <?php
              include 'database.php'; 
              $q = "select * from products";
              $query = mysqli_query($conn,$q);
              while($res = mysqli_fetch_array($query))
            { $dbId=$res['id'];
              $dbName=$res['name'];
              $dbDescription=$res['description'];
              $dbIsActive=$res['isactive'];
              $dbCreatedAt=$res['created_at'];
              $dbUpdatedAt=$res['updated_at'];
              /*$u_Email = $_SESSION['email'];
              if(($u_Email == $dbEmail))
              {
                $flag ="pointer-events:none;";
              }*/
          ?>
                <tr class="text-center">
                  <td> <?php echo $dbId; ?> </td>
                  <td> <?php echo $dbName; ?> </td>
                  <td> <?php echo $dbDescription; ?> </td>
                  <td> <?php echo $dbIsActive; ?> </td>
                  <td> <?php echo $dbCreatedAt; ?> </td>
                  <td> <?php echo $dbUpdatedAt; ?> </td>
                  <td> <a href="edit-product.php?id=<?php echo $dbId; ?>" class="text-white btn-primary btn" onclick="update()"> Edit </a>&nbsp
                       <a href="delete-product.php?id=<?php echo $res['id']; ?>" class="text-white btn-danger btn" onclick=" deleted()"> Delete </a></td>
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