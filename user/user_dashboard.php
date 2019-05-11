<?php

include 'db_connection.php';
//$enroll=$_SESSION['enroll'];
//echo $enroll;
//$sql = "select name from user where enroll = $enroll"; 
//$sql=mysqli_query($dbconn,$sql);




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
			height: 555px;
			float: right;
            margin-top: -580px;
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
		<p class="text-danger"><b>  Questions asked by you: </b></p>
	    <?php
		     $sql = "select * from ques where enroll = '$enroll'"; 
             $sql=mysqli_query($dbconn,$sql);
	
	    ?>
 		<?php 
		while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		
		?>
		<div class="panel-heading">
			<p><b>Q.</b> <?php echo ($row['ques']); ?>
			<?php $qid= $row['qid']; ?>
			
			</p>
			
		</div>
		
		<div class="panel-body">
			<blockquote>
			 <?php
		     $sql1 = "select * from ans where qid = '$qid'"; 
             $sql1=mysqli_query($dbconn,$sql1);
	
	         ?>
 		<?php 
		while($row1 = mysqli_fetch_array($sql1, MYSQLI_ASSOC)){
		
		?>
				<p style="font-size:12px;"><b>Ans:</b><?php echo ($row1['ans']); ?></p>
				<?php $aenroll = $row1['enroll']; ?>
				<?php 
			      $sql9="select * from user where enroll = '$aenroll'";
			      $sql9=mysqli_query($dbconn,$sql9);
			     ?>
			     
			     <?php 
			
			      while($row9 = mysqli_fetch_array($sql9, MYSQLI_ASSOC)){
					  ?>
		
				<footer style="float:right"><?php echo ($row9['name']); ?> (<?php echo ($row9['branch']); ?>)</footer>
				<?php } ?>
				<?php } ?>
			</blockquote>
		</div>	
		<?php } ?>
		
	</div>
	<div class="panel panel-default myq">
		<div class="panel-footer">
			<a href="ques.php"><button input type="submit" name="submit" class="btn btn-danger">ASK QUESTION</button></a>
		</div>
	</div>
	
    <div class="panel panel-default allusers">
      
		    
       <?php
		      $sql = "select * from user"; 
              $sql=mysqli_query($dbconn,$sql);
		        if(isset($_POST['submit']))
                   {
                 $searchitem = $_POST['searchitem'];
                 //echo $searchitem;
                  $sql = " SELECT * FROM user where name like '%$searchitem%'";
                  $sql = mysqli_query($dbconn, $sql);
                     if(mysqli_num_rows($sql)<=0){
                         echo "<script>alert('No user with the name . , $searchitem ')</script>";
                         $sql = "SELECT * FROM user ORDER BY enroll";
                         $sql = mysqli_query($dbconn, $sql) or die('error getting');
                     }
                    } 
	          
			?>
     
		     
	
 		
    	<div class="panel-heading">
    		<form action="#" method="post" class="form-group">
				<input type="text" name="searchitem" class="form-control" style="width:80%"><button type="submit" name="submit" class="btn" style="float:right;margin-top:-34px;margin-right:20px;"><span class="glyphicon glyphicon-search"></span></button>	
			</form>
  	         
    	</div>
    	<?php 
		while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		
		?>
    	<div class="panel-body" style="background-color:lightgray; padding:5px;border:1px solid darkgray">
    	    
    		<div class="jsus" style="">
				<p style=""><?php echo ($row['name']); ?><br>
				( <?php echo ($row['branch']); ?> - <?php echo ($row['year']); ?> )</p>
			</div>
    	</div>
    	<?php } ?>
    </div>
	
	
</body>
</html>