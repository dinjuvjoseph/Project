<?php
 include("connect/dbconnection.php");
	
	   
		   $a=$_POST['emailid'];
		   $b=$_POST['pass'];
		   $res=mysqli_query($db,"select * from `login` where `lemail`='$a' and `lpassword`='$b'");
		   $row=mysqli_fetch_array($res);
		   if(!empty($row)){
			   $a=$row['ltype'];
			   if($a==1)
			   {
				   session_start();
				   $_SESSION['username']=$row['lemail'];
				   $_SESSION['password']=$row['lpassword'];
				   $_SESSION['reg_id']=$row['lid'];
				   
			    header("Location:adminhome.php");
			   }
			   else if($a==2)
			   {
				   session_start();
				   $_SESSION['username']=$row['lemail'];
				   $_SESSION['password']=$row['lpassword'];
				   $_SESSION['reg_id']=$row['lid'];
				    header("Location:staffhome.php");
			   }
			   else
			   {
			   //session_start();
			   $_SESSION['username']=$row['lemail'];
			    $_SESSION['password']=$row['lpassword'];
			    header("Location:menu.php");
		   }
		  
		   }
		   else
			   echo "Invalid username or password";
		   
		   ?>