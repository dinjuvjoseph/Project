<?php include('header.php'); ?>

  <!-- Top  main section Start -->
  <section class="top-main">
    <div class="top-site-images">
      <img src="assets/img/bg/reservation.jpg" alt="">
    </div>
    <div class="page-title-wrapper">
      <div class="container">
        <div class="banner-wrapper">
          <h1 class="heading">Registration</h1>
          
        </div>
      </div>
    </div>
  </section>
  <!-- Top  main section End -->

  <!-- Page Section Start -->
  <div class="page-container">
    <!-- Contact Form Section Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form text-center">
            <div class="section-title">
              <h2>Registration</h2>
             
            </div>
            <form  method="post"  action="#">
            
              <div class="col-md-12">
              
              <label title="ssss" class="col-md-3">Full Name</label>
                <div class="form-group col-md-9" >
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Your name" required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                </div>
                <label title="ssss" class="col-md-3">Email Id</label>
                <div class="form-group col-md-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="your email address"  data-error="Please enter your email" required>
                    <div class="help-block with-errors"></div>
                </div>
                <label title="ssss" class="col-md-3">Phone Number</label>
                <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="your phone number" minlength="10" data-error="Please enter your phone number" required>
                    <div class="help-block with-errors"></div>
                </div> 
                <label title="ssss" class="col-md-3 ">Password</label>
                 <div class="form-group col-md-9">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="your password" minlength="6" data-error="Please enter your password of length 6" required>
                    <div class="help-block with-errors"></div>
                </div>              
             
             <div class="col-md-12"> 
                
               
               <!-- <input type="submit" id="isubmit" name="isubmit" class="btn btn-common btn-sn">Register-->
                   <button class="btn btn-primary " name="insSubmit" id="insSubmit" type="submit" >Submit </button> 
               
                <div class="clearfix"></div>   
             </div>
             </div>
            </form>   
 </div>



          </div>
        </div>
      </div>
    </div>
    <!-- Contact Form Section End -->

  
    <!-- Reservation Info Start -->

  </div>
  <!-- PageSection End -->

  <?php include('footer.php'); ?>
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
	echo ("<SCRIPT LANGUAGE='JavaScript'>   window.location.href='sample.php?msg=$msg'</SCRIPT>");
	//header("location:user_account.php?msg=$msg");
	exit();
}
else
{ echo ($_POST['isubmit']);
	echo "dfgdfg";
}
?>