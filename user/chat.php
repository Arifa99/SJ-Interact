<?php
session_start();
include 'db_connection.php';
$uid =  $_SESSION["enroll"];
if(isset($_POST['submit']))
{
	$chat = $_POST['chat'];
	$query="insert into chat (chat,uid) values ('$chat','$uid')";
	$sql=mysqli_query($dbconn,$query);
	if($sql)
	{
		//echo "yes";
		header("Location:chat.php");
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta http-equiv="refresh" content="20" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>chat box.....</title>
	<style>
	.panel{
		width: 40%;
		height: 500px;
		margin-left: 25%;
	  margin-top: 5%;
		overflow-x: none;
		overflow-y: scroll;
	}
		.user-chat{
			width: 100%;
			background-color: #c4c8c8;
			height: auto;
			padding: 5px;
			border: none;
		    color: darkslateblue;
			border-radius: 5px;
		
		}
		
			
		.body{
			background-color: whitesmoke;
		}
		.jsheader{
			width: 100%;
			height:70px;
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
		
		
	</style>
	
</head>
<body>
<?php
         	
		     $sql = "select * from user where enroll = '$uid'"; 
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
			<li><span class="glyphicon glyphicon-dashboard"><a href="user_dashboard.php">  Dashboard</a></span></li><br>
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
	<p id="showScroll"></p>
	<div class="panel panel-default">
		<div class="panel-heading">
			<p class="text-danger">Group Chatting</p>
		</div>
		<?php 
		  $sql= "select * from chat";
		  $sql=mysqli_query($dbconn,$sql);
		  $uid =  $_SESSION["enroll"];
		
		?>
		<?php 
		while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		
		?>
		<?php $aenroll = $row['uid']; ?>
		<div class="panel-body">
			<div class="user-chat">
			    <?php 
		  			$sql1= "select * from user where enroll = '$aenroll'";
		  			$sql1=mysqli_query($dbconn,$sql1);
		  			
		
				?>
		<?php 
		while($row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC)){
		
		?>
			
				<p class="text-danger"><b><?php echo ($row1['name']); ?>- <?php echo ($row1['branch']); ?> ( <?php echo ($row1['year']); ?> )</b></p>
				
				<p><?php echo ($row['chat']); ?></p>
			</div>
		</div>     
				<?php } ?>
					<?php } ?>
		<div class="panel-footer">
		   <form method="post" class="form-group">
			
			<input type="text" class="form-control" name="chat" style="">
			<input type="submit" class="btn btn-danger" name="submit" value="submit" style="margin-top:-35px;float:right">
			</form>
		</div>

	</div>
	
</body>
</html>