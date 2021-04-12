<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
     }  
</style>  
  
<body>  
  
<div class="table-scrol">  
    <h1 align="center">All the Users</h1>  
  
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>User Id</th>  
            <th>User Name</th>  
            <th>User E-mail</th>  
            <th>User Pass</th>  
            <th>Delete User</th>  
        </tr>  
        </thead>  
  
        <?php  
        $dbcon=mysqli_connect("localhost","root","","test_login1");  
        $sel="select * from users";
        $rs=$dbcon->query($sel);

  
        while($row=$rs->fetch_assoc())//while look to fetch the result and store in a array $row.  
        {  
           
  
        ?>  
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $row['id'];  ?></td>  
            <td><?php echo $row['username'];  ?></td>  
            <td><?php echo $row['email'];  ?></td>  
            <td><?php echo $row['password'];  ?></td>  
            <!--btn btn-danger is a bootstrap button to show danger-->  
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>  
</body>  
  
</html> 