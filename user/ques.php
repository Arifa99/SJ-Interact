<?php 
include 'db_connection.php';
session_start();
$enroll=$_SESSION['enroll'];
//echo "$enroll";
if(isset($_POST['submit']))
   {
	         $enroll=$_SESSION['enroll'];
	         $ques=$_POST['ques'];
	         $fname=$_POST['fname'];
		     $sql = "insert into ques (ques,enroll,field) values ('$ques','$enroll','$fname')"; 
             $sql=mysqli_query($dbconn,$sql);
	         if($sql)
			 {
				 echo "<script>alert('Question submitted successfully'); </script>";
				 header("Location:user_dashboard.php");
			 }
   }



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<style>
		
		.body{
			background-color: whitesmoke;
		}
		.jsheader{
			width: 100%;
			height:auto;
			background-color: darkgray;
			padding: 8px;
			
		}
		.jscol{
			color: white;
		}
		.jsnav{
			width: 17%;
			height: 595px;
			padding: 0px;
			background-color: gainsboro;
			float: left;
		
			
		}
		ul{
			list-style-type: none;
			
		}
		a {
			text-decoration: none;
			color: black;
		}
		a:hover{
			text-decoration: none;
			color: ghostwhite;
		}
		.myques{
			width: 50%;
			height: 480px;
			margin-left: 19%;
			margin-top: 20px;
			overflow-x: none;
			overflow-y: scroll;
			
			
		}
		.myq{
		    width: 50%;
			margin-left: 19%;
			position: relative;
			top: 0px;
		}
		
		.allusers{
			width: 25%;
			height: 300px;
			float: right;
            margin-top: -580px;
			margin-right: 30px;
			overflow-y: scroll;
		}
	</style>
</head>
<body>
	<?php
         	 
		     $sql = "select * from user where enroll = '$enroll'"; 
             $sql=mysqli_query($dbconn,$sql);
	
	    ?>
 		<?php 
		while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		
		?>
	<div class="jsheader container-fluid">
		<h3 class="jscol"><b>INTERACT</b></h3>
		<p style="float:right;margin-top:-50px;color:white;text-align:center"><?php echo strtoupper($row['name']); ?><br> <?php echo ($row['course']); ?>-<?php echo ($row['branch']); ?></p><br>
		<? } ?>
	</div>
	<div class="jsnav container-fluid">
		<ul>
		    <br>
			<li><span class="glyphicon glyphicon-dashboard"><a href="#">  Dashboard</a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Artificial Intelligence  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="webdev.php"> Web Development </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Programming  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Electronic  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> IOT  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Miscelleneous  </a></span></li><br>
			<li><span class="glyphicon glyphicon-user"><a href="#"> Profile </a></span></li><br>
			<li><span class="glyphicon glyphicon-log-out"><a href="logout.php"> Logout </a></span></li><br>
			
		</ul>
	</div>
	
	<div class="panel panel-default myques">
		<div class="panel-heading">
			<p>Write Ques.</p>
			
		</div>
		
		<div class="panel-body">
			<form method="post" action="#">
				<textarea name="ques" id="ques" cols="80" rows="10" placeholder="Type the Question........"></textarea><br>
				Select Field:<select name="fname" onchange='CheckItem(this.value);'>
                    <option> <center value=""> --Field Name--</center></option>
          
                    <?php 
                       
                        $query = "SELECT * FROM `fields`";
                        $result1 = mysqli_query($dbconn, $query);

                    ?>
                    
                    <?php while($row1 = mysqli_fetch_array($result1)):;?> 
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1]; ?></option>
                    <?php endwhile ?>
                </select><br><br>
				<input type="submit" class="btn btn-success" name="submit">
				<a href="user_dashboard.php" class="btn btn-danger">Cancel</a>
			</form>
		</div>	
		
	</div>
	
	
	
</body>
</html>