<?php
session_start();
include 'db_connection.php';
if(isset($_POST['submit']))
{
	$enroll=($_POST['enroll']);
	$pass=($_POST['pass']);

	$query = "select * from user where enroll='$enroll' and pass='$pass'";
	$query=mysqli_query($dbconn,$query);
	if(mysqli_num_rows($query)==1)
	{
		$_SESSION['enroll']=$enroll;
		header("Location:user_dashboard.php");
	}else{
		echo "<script>alert('Incorrect Login Details!');</script>";
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
	body{
		background-color: whitesmoke;
	}
    .login
    {
        position: relative;
        top: 50px;
        left: 400px;
        height: 400px;
        width: 400px;
        
    }
    .header
    {
       height: 75px;
        width: 100%;
        background: #585c5f;
        color: white;
    }
    .footer
    {
        position: relative;
        /*top: 450px;*/
        height: 75px;
        width: 100%;
        background: #585c5f;
    }
    .i
    {
       background: transparent;
        outline: 0;
        border: 0;
        border-bottom: 2px solid darkred;
        width: 200px;
        height: 30px;
    }
    .j
    {
        border-radius: 0;
        background: darkred;
        color: white;
        width: 140px;
        height: 40px;
    }
    .body
    {
        background: #c4c8c8;
        height: 400px;
        width: 100%;
    }
    .rem
    {
        background: darkred;
        position: relative;
        left: 380px;
        top: -38px;
        color: white;
        height: 20px;
        width: 20px;
    }
	.jsheader{
			width: 1390px;
			height:75px;
			background-color:#6b1111;
			/*padding: 8px;*/
            margin-left: -10px;
            margin-top: -10px;
            font-family: cursive;
          
			
		}
	.footer
        {
            height: auto;
            width: 1390px;
            background-color:#6b1111; 
           
             position: relative;
            top: 30px;
            margin-top: 150px;
            
        }
    </style>
</head>
<body>
      <br>
       <a href="user/login.php" style="float:right;margin-right:30px;color:white">Log in</a>
    <div class="jsheader container-fluid">
		
         <div style="float:left">
             
        
        <img src="logo.jpg" alt="image not found" style="border-radius:50px;position:relative;top:7px;left:10px" height="50px" width="50px"> 
         </div>
         <div>   
			 <h1 style="color:whitesmoke;position:relative;left:50px"><b>INTERACT</b></h1>
			
        </div>
         
          
	</div>
    <div class="login">
       <form action="#" method="post">
        <!--div class="header">
            <h1><center>Sign In</center></h1>
        </div-->
        <div class="body">
           <br><br>
           <span class="glyphicon glyphicon-remove rem"></span>

           <h1 style="color:darkred"><center>Sign In</center></h1>
           <br><br>
            <center><input type="text" placeholder="Enrolment No." name="enroll"  class="i"></center>
            <br>
             <center><input type="password" placeholder="Password" name="pass"  class="i"></center>
             <br><br>
            <input type="submit" class="btn j" name="submit" style="position:relative;top:10px;left:60px" value="sign in">
			
           
        </div>
        <!--div class="footer">
            
        </div-->
         </form>
         <a href="regis.php" class="btn j" style="position:relative;top:-100px;left:220px">Sign Up</a>
    </div>
 
    <div class="footer" style="color:whitesmoke;padding:10px">
	
			<p>
       <center> Privacy policy|Terms and Conditions|Contact us
        &copy;copyright @all rights reserved</center>
	</p>		
	</div>
</body>
</html>