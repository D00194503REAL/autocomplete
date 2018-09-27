<?php
$connect = mysqli_connect("localhost", "root", "", "locations"); // connects to the database
mysqli_set_charset($connect, "utf8"); // show original letters(not question marks)

// if statement only works if val is not empty
if (!empty($_POST["val"])) { 
    
    // query to get id of selected country
    $countryIdQuery = "SELECT id FROM countries WHERE country = '" . $_POST["val"] . "' ";
    // runs query, stores result in array $countryIdArray
    $countryIdArray = mysqli_query($connect, $countryIdQuery);
    $countryId = mysqli_fetch_assoc($countryIdArray);

    // query to get counties
    $query = "SELECT name FROM counties WHERE country_id = '" . $countryId["id"] . "'";
    // runs query, stores result in $result
    $result = mysqli_query($connect, $query);
    
    // creates options 
    if (mysqli_num_rows($result) > 0) {
        $output .= "<option disabled selected>Select county</option>";

        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option>' . $row["name"] . '</option>';
        } echo $output;
    }
    
    // if $result = to 0, adds option Counties Not Found
    else {
        $output .= '<option>Counties Not Found</option>';
    }
}
?> 