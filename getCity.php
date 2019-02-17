<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM district WHERE stateID = '" . $_POST["state_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select District</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
<?php
    }
}
?>