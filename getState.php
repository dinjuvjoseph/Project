<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM state WHERE countryID = '" . $_POST["country_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
    }
}
?>