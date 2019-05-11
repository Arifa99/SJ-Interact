<?php
session_start();

include 'db_connection.php';
/*$my= "select * from online where name='$name'";
		$my=mysqli_query($dbconn,$my);
		if(mysqli_num_rows($my)==1)
		{
			$nq="update online set flag = 'no' where name='$name'";
			mysqli_query($dbconn,$nq);
		} */
session_destroy();
header("Location:../index.php");

?>
