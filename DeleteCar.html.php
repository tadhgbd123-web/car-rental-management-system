<!--Tadhg Brennan
    C00308963
    16/03/2026
    Car Rental Project - Delete Car -->
<?php
session_start();
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="Style.css" />
</head>

<body>

<div class="navbar">
    <a href="index.html">Home</a>
    <a href="AddNewCar.html.php">Add Car</a>
    <a href="AmendViewCar.html.php">Amend Car</a>
    <a href="DeleteCar.html.php">Delete Car</a>
    <img src="logo.png" alt="My Logo" class="logo">
</div>

<h1>Delete a Car</h1>
<h4>Please select a car and then click the delete button</h4>

<?php include 'DeleteCarListbox.php'; ?>

<script>

function populate()
{
    var sel = document.getElementById("listbox");
    var result;

    result = sel.options[sel.selectedIndex].value;

    var carDetails = result.split(',');

    document.getElementById("display").innerHTML =
    "The details of the selected car is: " + result;

    document.getElementById("delRegNo").value = carDetails[0];
    document.getElementById("delCarType").value = carDetails[1];
    document.getElementById("delColour").value = carDetails[2];
    document.getElementById("delBody").value = carDetails[3];
    document.getElementById("delNumDoors").value = carDetails[4];
    document.getElementById("delDate").value = carDetails[5];
    document.getElementById("delStatus").value = carDetails[6];



}

function confirmCheck()
{
    var response;

    response = confirm('Are you sure you want to delete this car?');

    if(response)
    {
        document.getElementById("delRegNo").disabled = false;
        document.getElementById("delCarType").disabled = false;
        document.getElementById("delColour").disabled = false;
        document.getElementById("delBody").disabled = false;
        document.getElementById("delNumDoors").disabled = false;
        document.getElementById("delDate").disabled = false;
        document.getElementById("delStatus").disabled = false;


        return true;
    }
    else
    {
        populate();
        return false;
    }
}

</script>
	
	<h4>
<p id="display"></p>
	</h4>
	
	<div class="form">

<form name="deleteForm" action="DeleteCar.php"
onsubmit="return confirmCheck()" method="post">

<label for="delRegNo">Registration Number</label>
<input type="text" name="delRegNo" id="delRegNo" disabled>

<label for="delCarType">Car Type</label>
<input type="text" name="delCarType" id="delCarType" disabled>


<label for="delColour">Colour</label>
<input type="text" name="delColour" id="delColour" disabled>


<label for="delBody">Body Style</label>
<input type="text" name="delBody" id="delBody" disabled>


<label for="delNumDoors">Number of Doors</label>
<input type="number" name="delNumDoors" id="delNumDoors" disabled>


<label for="delDate">Date added to Fleet</label>
<input type="date"  name="delDate" id="delDate" value="<?= date('Y-m-d') ?>" disabled>

<label for="delStatus">Current Status</label>
<input type="text" name="delStatus" id="delStatus" disabled>

<br><br>

<input type="submit" value="Delete the record">

</form>
	</div>

<?php
if(isset($_SESSION["RegistrationNumber"]))
{
    echo "<p class='myMessage'>Record deleted for ".
    $_SESSION["RegistrationNumber"] . "</p>";
}

session_destroy();
?>

</body>
</html>