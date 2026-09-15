<!--Tadhg Brennan
    C00308963
    09/03/2026
    Amend/View Car Listbox - Car Rental Project Screen -->
    <?php
include "db.inc.php";//database connection

// sets the default timezone
date_default_timezone_set('UTC');

// SQL query to retrieve a cars details who is not deleted
$sql = "SELECT CarId, RegistrationNumber, CarTypeID, Colour, ChassisNumber, BodyStyle, NumberOfDoors, PurchasePrice, DateAddedToFleet 
FROM Car 
WHERE DeletedFlag = 0";

// Executes the query and checks if it works
if (!$result = mysqli_query($con, $sql))
{
    // error message if query is unsuccessful
    die( 'Error in querying the database' . mysqli_error($con));
}

// Create a listbox and calls the populate() function when it is clicked
echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

// loop through each record that is returned 
while ($row = mysqli_fetch_array($result))
{
    // store each field into variables 
    $id = $row['CarId'];
    $regNo = $row['RegistrationNumber'];
    $carType = $row['CarTypeID'];
    $colour = $row['Colour'];
    $chassisNo = $row['ChassisNumber'];
    $body = $row['BodyStyle'];
    $noDoors = $row['NumberOfDoors'];
    $price = $row['PurchasePrice'];
    $date = $row['DateAddedToFleet'];


    // converts Date added into a date object
    $date = date_create($row['DateAddedToFleet']);

    //formats the date YYYY/MM/DD
    $date = date_format($date,"Y-m-d");

    // combine all values into one String
    $allText = "$id,$regNo,$carType,$colour,$chassisNo,$body,$noDoors,$price,$date";

    //Display each car as an option in the listbox
    echo "<option value = '$allText'>$regNo</option>";
}
// close listbox
echo "</select>";

// close DB connection
mysqli_close($con);
?>
