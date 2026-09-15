<!--Car Rental 3 
    Tadhg Brennan
    C00308963
    09/02/2026 
    AddNewCar.php -->
    <?php
    
    //database connection
    include 'db.inc.php';

    //sets default timezone
    date_default_timezone_set("UTC");

    //heading text
    echo "The details sent down are: <br>";

    // for values used to be entered by the user
    echo "Registration Number is: " . $_POST['RegistrationNumber'] . "<br>";

    // Creates a date variable based off the DateAdded input
    $date = date_create($_POST['DateAddedToFleet']);
    $DateAddedToFleet = date_format($date, "Y-m-d");

    
    // SQL Query that inserts the inputs into the table in the DB
    $sql = "Insert into Car (RegistrationNumber, CarTypeId, Colour, ChassisNumber, BodyStyle, NumberOfDoors, PurchasePrice, DateAddedToFleet, CurrentStatus, CumulativeRentals, DeletedFlag)
    VALUES ('$_POST[RegistrationNumber]',
    '$_POST[CarTypeId]','$_POST[Colour]',
    '$_POST[ChassisNumber]',
    '$_POST[BodyStyle]',
    $_POST[NumberOfDoors],
    $_POST[PurchasePrice],
    '$DateAddedToFleet',
    'Available', 0, 0)";

    // executes query
    if (!mysqli_query($con,$sql))
    {
        //displays if their is an error
        die ("An Error in the SQL Query: " . mysqli_error($con) );
    }

    // find and defines 'latestCarId' to be the last Car ID
    $latestCarId = mysqli_insert_id($con);

    // success message is displayed if successful
    echo "<br>A record had been successfully added for Car ID:" . $latestCarId . ", with the Registration Number of " . $_POST['RegistrationNumber'] . "." ;

    // closes the connection to the DB
    mysqli_close($con);

    ?>

    <!-- form field including submit button -->
    <form action = "AddNewCar.html.php" method = "POST" >
        <br>    
        <input type="submit" value = "Return to Insert Page"/>
        
</form>