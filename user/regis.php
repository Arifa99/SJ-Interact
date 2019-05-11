<?php

include 'db_connection.php';
if(isset($_POST['submit']))
{
	$name=($_POST['name']);
	$email=($_POST['email']);
	$enroll=($_POST['enroll']);
	$pass=($_POST['pass']);
	$year=($_POST['year']);
	$branch=($_POST['branch']);
	$phone=($_POST['phone']);
	$course=($_POST['course']);
	echo $name;
	$query = "insert into user (name,enroll,course,year,phone,pass,branch,email) values ('$name','$enroll','$course','$year','$phone','$pass','$branch','$email')";
	$query=mysqli_query($dbconn,$query);
	if($query)
	{
		
		header("Location:../index.php");
	}else{
		echo "<script>alert('Unable to register!');</script>";
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
        top: 5px;
        left: 400px;
        height: 700px;
        width: 400px;
        
    }
    .header
    {
       height: 75px;
        width: 100%;
        background: #585c5f;
        color: white;
    }
   /* .footer
    {
        position: relative;
        top: 450px;
        height: 75px;
        width: 100%;
        background: #585c5f;
    }*/
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
       
        width: 100%;
    }
    .rem
    {
        background: darkred;
        position: relative;
        left: 380px;
        /*top: -38px;*/
        color: white;
        height: 20px;
        width: 20px;
    }
    .sclass
    {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 2px solid darkred;
        width: 200px;
        height: 30px;
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
            top: -40px;
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
      
        <!--div class="header">
            <h1><center>Sign In</center></h1>
        </div-->
        <div class="body" style="margin-top:30px;">
    
           <span class="glyphicon glyphicon-remove rem"></span>

           <h1 style="color:darkred"><center>Register</center></h1>
           <br>
            <form action="#" method="post">
            <center><input type="text" placeholder="Name" name="name"  class="i" required></center>
            <br>
             <center><input type="text" placeholder="Enrolment No." name="enroll"  class="i" required></center>
             <br>
              <center><select name="course" id="" class="sclass" style="" required>
                 <option value="0">Course</option>
                  <option value="B.Tech">B.Tech</option>
                  <option value="BCA">BCA</option>
                  <option value="M.Tech">M.Tech</option>
                  <option value="MCA">MCA</option>
                  <!--option value="others">others</option -->
              </select></center>
            <br>
            <center> <select name="branch" id="" class="sclass" required>
                <option value="0">Branch</option>
                 <option value="Mechanical">Mechanical</option>
                 <option value="Civil">Civil</option>
                 <option value="Electrical">Electrical</option>
                 <option value="Computer">Computer</option>
                 <option value="Electronics">Electronics</option>
                 <option value="Chemical">Chemical</option>
                 <option value="Petro-Chemical">Petro-Chemical</option>
             </select></center>
            <br>
            <center>
                <select name="year" id="" class="sclass" required>
                    <option value="1 year">1st year</option>
                    <option value="2 year">2nd year</option>
                    <option value="3 year">3rd year</option>
                    <option value="4 year">4th year</option>
                    <option value="pass out">Pass out</option>
                </select>
            </center>
            <br>
             <center><input type="email" placeholder="Email" name="email"  class="i" required></center>
            <br>
             <center><input type="text" placeholder="Phone No." name="phone"  class="i" required></center>
            <br>
             <center><input type="password" placeholder="Set Your Password" name="pass"  class="i" required></center>
            <br>
             <br>
				<center> <button type="submit" class="btn j" name="submit" style="position:relative;top:-10px">Sign Up</button></center>
			</form>
        </div>
        
         
    </div>
   
	<div class="footer" style="color:whitesmoke;padding:20px;">
	<p>
       <center> Privacy policy|Terms and Conditions|Contact us
        &copy;copyright @all rights reserved</center>
	</p>
					
	</div>

</body>
</html>