<!--Tadhg Brennan
    C00308963
    09/03/2026
    Amend/View Car - Car Rental Project Screen -->
    <!DOCTYPE html>
<html>
<head>

<!-- Link to external CSS  -->
<link rel="stylesheet" href="Style.css">

</head>

<body>
    
<div class="navbar">
    <a href="index.html">Home</a>
    <a href="AddNewCar.html.php">Add Car</a>
    <a href="AmendViewCar.html.php">Amend Car</a>
    <a href="DeleteCar.html.php">Delete Car</a>
    <img src="logo.png" alt="My Logo" class="logo">
</div>

<!-- Page heading -->
<h1>Amend/View a Car</h1>
<h4>Please select a car and then click the "Save Changes" button if you wish to update</h4>

<!-- Include the PHP file that generates the listbox -->
<?php include 'AmendViewCarListbox.php'; ?>

<script>

// Function that populates the textboxes when a car is selected
function populate()
{
    // Get the selected value from the listbox
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;

    // Split into individual car details
    var carDetails = result.split(',');

    // Display the selected car's details on screen
    document.getElementById("display").innerHTML = 
        "The details of the selected car are: " + result;

    // Assign the values to the form fields
    document.getElementById("amendid").value = carDetails[0];
    document.getElementById("amendRegistrationNum").value = carDetails[1];
    document.getElementById("amendCarType").value = carDetails[2];
    document.getElementById("amendColour").value = carDetails[3];
    document.getElementById("amendChassisNum").value = carDetails[4];
    document.getElementById("amendBodyStyle").value = carDetails[5];
    document.getElementById("amendNumOfDoors").value = carDetails[6];
    document.getElementById("amendPurchasePrice").value = carDetails[7];
    document.getElementById("amendDateAdded").value = carDetails[8];

}


// Function to toggle fields 
function toggleLock()
{
    // Checks the current value of the button 
    if (document.getElementById("amendViewbutton").value == "Amend Details")
    {
        // Enable the fields for editing
        document.getElementById("amendRegistrationNum").disabled = false;
        document.getElementById("amendCarType").disabled = false;
        document.getElementById("amendColour").disabled = false;
        document.getElementById("amendChassisNum").disabled = false;
        document.getElementById("amendBodyStyle").disabled = false;
        document.getElementById("amendNumOfDoors").disabled = false;
        document.getElementById("amendPurchasePrice").disabled = false;
        document.getElementById("amendDateAdded").disabled = false;

        // Change button text
        document.getElementById("amendViewbutton").value = "View Details";
    }
    else
    {
        // Disable the fields again
        document.getElementById("amendRegistrationNum").disabled = true;
        document.getElementById("amendCarType").disabled = true;
        document.getElementById("amendColour").disabled = true;
        document.getElementById("amendChassisNum").disabled = true;
        document.getElementById("amendBodyStyle").disabled = true;
        document.getElementById("amendNumOfDoors").disabled = true;
        document.getElementById("amendPurchasePrice").disabled = true;
        document.getElementById("amendDateAdded").disabled = true;
        // Reset button text
        document.getElementById("amendViewbutton").value = "Amend Details";
    }
}


// Function to confirm before saving changes
function confirmCheck()
{
    var response;

    // Asks the user to confirm the update
    response = confirm('Are you sure you want to save these changes?');

    if (response)
    {
        // Enable fields so values can be submitted
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendRegistrationNum").disabled = false;
        document.getElementById("amendCarType").disabled = false;
        document.getElementById("amendColour").disabled = false;
        document.getElementById("amendChassisNum").disabled = false;
        document.getElementById("amendBodyStyle").disabled = false;
        document.getElementById("amendNumOfDoors").disabled = false;
        document.getElementById("amendPurchasePrice").disabled = false;
        document.getElementById("amendDateAdded").disabled = false;

        return true;
    }
    else
    {
        // Reload original values and toggles fields
        populate();
        toggleLock();
        return false;
    }
}

</script>

<!-- display selected car -->
	<h4>
<p id="display"></p>
	</h4>

<div class="button">
<!-- Button to toggle between viewing and amending -->
<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
</div>
	
<div class="form">
<!-- Form to send updated data to AmendView.php -->
<form name="myForm" action="AmendViewCar.php" onsubmit="return confirmCheck()" method="post">

<label for="amendid">Car ID</label>
<input type="text" name="amendid" id="amendid" disabled>

<br>

<label for="amendRegistrationNum">Registration Number</label>
<input type="text" name="amendRegistrationNum" id="amendRegistrationNum" pattern="[0-9]{2,3}-[A-Z]{1,2}-[0-9]{1,5}" title="Format is 261-CW-123" disabled>

<br>

<label for="amendCarType">Car Type</label>
        <select name="amendCarType" id="amendCarType" disabled>
            <option value="" disabled selected>Select Car Type</option>
            <?php
            include 'AddNewCarListbox.php';
            ?>
            </select>

            <br>

<label for="amendColour">Car Colour</label>
            <select name="amendColour" id="amendColour" disabled>
                <option value="" disabled selected>Select Colour</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Silver">Silver</option>
                <option value="Blue">Blue</option>
                <option value="Red">Red</option>
                <option value="Green">Green</option>
            </select>
<br>

<label for="amendChassisNum">Chassis Number</label>
<input type="text" name="amendChassisNum" id="amendChassisNum" disabled>

<br>

<label for="amendBodyStyle">Body Style</label>
         <select name="amendBodyStyle" id="amendBodyStyle" disabled>
            <option value="" disabled selected>Select Body Style</option>
            <option value="SUV">SUV</option>
            <option value="Sedan">Sedan</option>
            <option value="HatchBack">HatchBack</option>
            <option value="Pickup Truck">Pickup Truck</option>
            <option value="Convertible">Convertible</option>
            <option value="Luxury">Luxury</option>
            <option value="Minivan">Minivan</option>
            <option value="Sports Car">Sports Car</option>
        </select>
<br>

<label for="amendNumOfDoors">Number of Doors</label>
<input type="number" name="amendNumOfDoors" min="1" max="10" id="amendNumOfDoors" disabled/>

<br>

<label for="amendPurchasePrice">Purchase Price</label>
     <input type="number" name="amendPurchasePrice" steps="0.1" min="0" id="amendPurchasePrice" disabled/>

<br>

<label for="amendDateAdded">Date Added to Fleet</label>
     <input type="date"  name="amendDateAdded" id="amendDateAdded" value="<?= date('Y-m-d') ?>" disabled/>

<br><br>

<!-- Submit button -->
<input type="submit" value="Save Changes">

</form>
	</div>

</body>
</html>