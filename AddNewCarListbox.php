<!-- Car Rental 3 
    Tadhg Brennan
    C00308963
    12/02/2026 -->
    <?php
    include "db.inc.php";//database connection

    // sets default timezone
    date_default_timezone_set('UTC');

    $sql = "SELECT CarTypeID, ModelName, CarVersion, EngineSize, FuelType, Manufacturer FROM CarType";

    //  Executes the query and checks if it works
if (!$result = mysqli_query($con, $sql))
{
    // error message if query is unsuccessful
    die( 'Error in querying the database' . mysqli_error($con));
}

// loop through each record that is returned 
while ($row = mysqli_fetch_array($result))
{
    // store each field into variables 
    $modelName = $row['ModelName'];
    $carVersion = $row['CarVersion'];
    $engineSize = $row['EngineSize'];
    $fuelType = $row['FuelType'];
    $manufacturer = $row['Manufacturer'];
	
	$carTypeId = $row['CarTypeID'];

    // combine all values into one String
    $allTypes = "$modelName, $carVersion, $engineSize, $fuelType ,$manufacturer";

    //Display each person as an option in the listbox
    echo "<option value = '$carTypeId'>$allTypes</option>";
}

// close DB connection
mysqli_close($con);
?>
