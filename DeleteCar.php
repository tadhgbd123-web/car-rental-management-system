<!--Tadhg Brennan
    C00308963
    16/03/2026
    Car Rental Project - Delete Car -->
<?php
session_start();

include 'menu.php';
include 'db.inc.php';

$sql = "UPDATE Car
        SET DeletedFlag = true
        WHERE RegistrationNumber = '$_POST[delRegNo]'";

/* alternatively if you want to actually delete the record

$sql = "DELETE FROM Car
        WHERE RegistrationNumber = '$_POST[delRegNo]'";

*/

if(!mysqli_query($con, $sql))
{
    echo "Error ".mysqli_error($con);
}

$_SESSION["RegistrationNumber"] = $_POST['delRegNo'];
$_SESSION["CarTypeID"] = $_POST['delCarType'];
$_SESSION["Colour"] = $_POST['delColour'];
$_SESSION["BodyStyle"] = $_POST['delBody'];
$_SESSION["NumberOfDoors"] = $_POST['delNumDoors'];
$_SESSION["DateAddedToFleet"] = $_POST['delDate'];
$_SESSION["CurrentStatus"] = $_POST['delRdelStatusegNo'];


mysqli_close($con);

header('Location: DeleteCar.html.php');
exit();
?>