<?php
// connects to the database
require_once("dbcontroller.php");
$db_handle = new DBController();

// if statement only works if keyword is not empty
if(!empty($_POST["keyword"])) {
    
// selects all from countries where country starts with letter(s) passed by user
$query ="SELECT * FROM countries WHERE country like '" . $_POST["keyword"] . "%' ORDER BY country LIMIT 0,6";
// runs query, stores result in array $countryIdArray
$result = $db_handle->runQuery($query);
// if result is not empty
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<!-- onclick runs function selectCountry() -->
<li onClick="selectCountry('<?php echo $country["country"]; ?>');"><?php echo $country["country"]; ?></li>
<?php } ?>
</ul>

<?php } }


?>