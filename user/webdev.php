
<?php 
include 'db_connection.php';




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
		.myques{
			width: 80%;
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
            margin-top: -500px;
			margin-right: 30px;
			overflow-y: scroll;
		}
	</style>
</head>
<body>   
	    <?php
         	 session_start();
	         $enroll=$_SESSION['enroll'];
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
			<li><span class="glyphicon glyphicon-dashboard"><a href="user_dashboard.php">  Dashboard</a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Artificial Intelligence  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Web Development </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Programming  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Electronic  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> IOT  </a></span></li><br>
			<li><span class="glyphicon glyphicon-tasks"><a href="#"> Miscelleneous  </a></span></li><br>
			<li><span class="glyphicon glyphicon-user"><a href="#"> Profile </a></span></li><br>
			
		</ul>
	</div>
	<br>
	<div class="search" style="float:left;width:50%;margin-left:30px;">
		<form action="qsearch.php" method="post" class="form-group">
			<input type="text" name="search" class="form-control" placeholder="Search the Question....">
			<button type="submit" name="submit" class="btn" style="float:right;margin-top:-34px"><span class="glyphicon glyphicon-search"></span></button>	
		</form>
		<div style="float:right;margin-top:-135px;margin-right:-250px">
			<a href="chat.php"><button class="btn btn-danger" style="border-radius:100px;width:60px;height:60px;">Group<br> Chat</button></a>
		</div>
		
	</div>
	
	
	
	
	<div class="panel panel-default myques">
	    <?php
		     $sql7 = "select * from ques where field = '1'"; 
             $sql7=mysqli_query($dbconn, $sql7);
	
	    ?>
 		<?php 
		while($row1 = mysqli_fetch_array($sql7, MYSQLI_ASSOC)){
		?>
		<div class="panel-heading">
			<p>Q. <?php echo ($row1['ques']); ?>
			<?php $qid= $row1['qid']; ?>
			
			</p>
			
		</div>
		
		<div class="panel-body">
			<blockquote>
			    <?php
		     $sql1 = "select * from ans where qid = '$qid'"; 
             $sql1=mysqli_query($dbconn,$sql1);
	
	    ?>
 		<?php 
		while($row2 = mysqli_fetch_array($sql1, MYSQLI_ASSOC)){
		
		?>
				<p style="font-size:12px;"><b>Ans:</b> <?php echo ($row2['ans']); ?></p>
				<?php $aenroll=$row2['enroll']; ?>
				
				<?php
		     $sql5 = "select * from user where enroll = '$aenroll'"; 
             $sql5=mysqli_query($dbconn,$sql5);
	
	    ?>
 		<?php 
		while($row5 = mysqli_fetch_array($sql5, MYSQLI_ASSOC)){
		
		?>
		
				<footer style="float:right"><?php echo ($row5['name']); ?> (<?php echo ($row5['branch']); ?>)</footer>
				<?php } ?>
				<?php } ?>
				
				<form action="#" method="post" class="form-group">
				    <textarea name="ans" id="" cols="60" rows="3" class="form-control" placeholder="Type your answer..."></textarea><br>
					<input type="submit" name="submit" class="btn btn-success">
				
				</form>
				
			
			</blockquote>
		</div>	
		<?php } ?>
		<?php 			
				if(isset($_POST['submit']))
   				{
					
	         		$ans=$_POST['ans'];
		     		$sql3 = "insert into ans (ans,enroll,qid) values ('$ans','$enroll','$qid')"; 
             		$sql=mysqli_query($dbconn, $sql3);
	         		if($sql)
			 			{
				 			echo "<script>alert('Answer submitted successfully'); </script>";
						
			 			}
   				}
			?>
	
		
	</div>
	

	
	
	
</body>
</html>