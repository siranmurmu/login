<?php  
session_start();//session starts here  
  
?>  
  
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
  
</style>  
  
<body>  
  
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Sign In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="login.php">  
                        <fieldset>  
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                            </div>  
  
  
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
</body>  
  
</html>  
  
<?php  
  
$dbcon=mysqli_connect("localhost","root","","test_login1"); 
  
if(isset($_POST['login']))  
{  
    $e=$_POST['email'];  
    $p=$_POST['password'];  

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
  
    $check_user="SELECT * from users WHERE email='$e'AND password='$p'"; 
    $check_admin="SELECT * FROM admin where admin_email='$e' and admin_pass='$p'";
  
    $run=mysqli_query($dbcon,$check_user);  
    $run1=mysqli_query($dbcon,$check_admin);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('welcome.php','_self')</script>";  
  
        $_SESSION['email']=$e;//here session is used and value of $user_email store in $_SESSION.  
  
    }  
    else if(mysqli_num_rows($run1))
    {
    	echo "<script>window.open('admin_home.php','_self')</script>";  
    }
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?>  