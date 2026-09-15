<!--Tadhg Brennan
    C00308963
    16/03/2026
    Car Rental Project - Delete Car Listbox -->
    <?php
include "db.inc.php";//database connection

// sets the default timezone
date_default_timezone_set('UTC');

// SQL query to retrieve a cars details who is not deleted
$sql = "SELECT RegistrationNumber, CarTypeID, Colour, BodyStyle, NumberOfDoors, DateAddedToFleet, CurrentStatus
        FROM Car
        WHERE DeletedFlag = 0
        ORDER BY DateAddedToFleet";

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
    $regNo = $row['RegistrationNumber'];
    $carType = $row['CarTypeID'];
    $colour = $row['Colour'];
    $body = $row['BodyStyle'];
    $noDoors = $row['NumberOfDoors'];
    $date = $row['DateAddedToFleet'];
    $status = $row['CurrentStatus'];


    // converts Date added into a date object
    $date = date_create($row['DateAddedToFleet']);

    //formats the date YYYY/MM/DD
    $date = date_format($date,"Y-m-d");

    // combine all values into one String
    $allText = "$regNo,$carType,$colour,$body,$noDoors,$date,$status";
    //Display each person as an option in the listbox
    echo "<option value = '$allText'>$regNo</option>";
}
// close listbox
echo "</select>";

// close DB connection
mysqli_close($con);
?>
