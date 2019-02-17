<?php

include("connect/dbconnection.php");
//
if (isset($_POST['insSubmit'])) {
	$mId=0;
$sName 		= $_POST['sname'];
$email	= $_POST['email'];
$pWord		= $_POST['pass'];
$phone		= $_POST['phone'];
$pWord1		= md5($pWord);



	if($mId==0)
	{
		$results = mysqli_query($db,"SELECT `rid` FROM `register` WHERE `email`='$email' and `status`='1'");
		
		
		$email_exist = mysqli_num_rows($results); //total records
	
		//if value is more than 0, username is not available
		if($email_exist) {
			$msg="email already exists";
			header("location:register.php?msg=$msg");
			exit();
		}
		else
		{
				$res ="INSERT INTO `register`(`sname`, `password`,`phoneno`,`status`,`utype`) 
			VALUES ('$sName','$pWord1','$phone','1','3')";
			$z=mysqli_insert_id($db);
		   	$res1 = mysqli_query($db,"INSERT INTO `login`( `rid`,`lemail`, `lpassword`,`ltype`,`lstatus`) 
			VALUES ('$z','$email','$pWord','3','1')");
			 mysqli_query($db,$res);
			
		
			
			

		}
	}
	else
	{
		$res = mysqli_query($db,"UPDATE `register` SET `sname`='$sName',`email`='$email',`password`='$pWord1' ,`passtext`='$pWord' ,`phoneno`='$phone' 
		WHERE `rid`='$mId'");
	}
	
	
	
	if(!$res)
	{
		$msg="Error In Query".mysqli_error();
	}
	else
	{
		if($mId==0)
		{
			$msg="Successfully created User";
		}
		else
		{
			$msg="Successfully Updated User";
		}
	}
	echo ("<SCRIPT LANGUAGE='JavaScript'>   window.location.href='login.php?msg=$msg'</SCRIPT>");
	//header("location:user_account.php?msg=$msg");
	exit();
}
else
{ echo ($_POST['isubmit']);
	echo "dfgdfg";
}
?>