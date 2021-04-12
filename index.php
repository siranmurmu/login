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
<body> 
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Registration</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="index.php">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>  
                            </div>  
  
                            <div class="form-group">  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                            </div>  
  
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="reg" >  
  
                        </fieldset>  
                    </form>  
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  


<?php

$dbcon=mysqli_connect("localhost","root","","test_login1");//make connection here  
if(isset($_POST['reg']))  
{  
   $u=$_POST['username'];
	$e=$_POST['email'];
	$p=$_POST['password'];//same  
  
  
   if($u=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the username')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($e=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
exit();  
    }  
  
    if($p=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
    exit();  
    }  
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from users WHERE email='$e'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
		echo "<script>alert('Email $e is already exist in our database, Please try another one!')</script>";  
		exit();  
    }  
//insert the user into the database.  
    $ins="INSERT INTO users set username='$u', email='$e', password='$p'";
    if(mysqli_query($dbcon,$ins))  
    {  
        echo"<script>window.open('welcome.php','_self')</script>";  
    }  
} 
?>