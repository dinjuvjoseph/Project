<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM country";
$results = $db_handle->runQuery($query);
?> 
<html>
<head>
<head>
<style>
body{width:610px;font-family:calibri;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'state_id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">
<label>Name:</label> 
<input type="text" name="name"/><br><br>
<label>Country:</label>
<select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
<option value disabled selected>Select Country</option>
<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["countryID"]; ?>"><?php echo $country["country_name"]; ?></option>
<?php
}
?>
</select>
</div>
<div class="row">
<label>State:</label>
<select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
<option  value="">Select State</option>
</select>
</div>
<div class="row">
<label>District:</label>
<select name="city" id="city-list" class="demoInputBox">
<option value="">Select District</option>
</select>
</div>
<div>
<input type="submit" name="submit">
</div>
</div>
</body>
</html>
<?php
$sel1="select * from `country`";
	  $results = $db_handle->runQuery($sel1);
if(isset($_POST['submit']))
{
	$nme=$_POST['name'];
	$c=$_POST['country'];
	$s=$_POST['state'];
	$d=$_POST['city'];
	$query="INSERT INTO `user`( `name`, `cid`, `sid`, `did`) VALUES ('$nme','$c','$s','$d)";
	$results = $db_handle->runQuery($query);
	//header("location:view.php");
}
?>