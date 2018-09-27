<?php
$connect = mysqli_connect("localhost", "root", "", "locations"); // connects to the database
mysqli_set_charset($connect, "utf8"); // show original letters(not question marks)

// if statement only works if val is not empty
if (!empty($_POST["val"])) {

    // query to get id of selected towns
    $countyIdQuery = "SELECT id FROM counties WHERE name = '" . $_POST["val"] . "'";
    // runs query, stores result in array $countyIdArray
    $countyIdArray = mysqli_query($connect, $countyIdQuery);
    $countyId = mysqli_fetch_assoc($countyIdArray);

    // query to get towns
    $query = "SELECT townName FROM towns WHERE countyid = '" . $countyId["id"] . "'";
    // runs query, stores result in $result
    $result = mysqli_query($connect, $query);
    
    // creates options 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option>' . $row["townName"] . '</option>';
        } echo $output;
    } 
    
    // if $result = to 0, adds option Towns Not Found
    else {
        $output .= '<option>Towns Not Found</option>';
    }
    
}
?> 