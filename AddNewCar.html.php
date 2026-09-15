<!-- Car Rental 3 
    Tadhg Brennan
    C00308963
    09/02/2026 
    AddNewCar.html.php-->
    <!DOCTYPE html>
<html>
<head>
<title>Add New Car</title>
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
     <h1>Add New Car</h1>
     
<div class="scroll-container">
<div class="form">
     <!-- beggining of form and linking to PHP file -->
      <form action="AddNewCar.php" method="post" onsubmit="return confirm('Are you sure you want to add this car to the fleet?');">
        
      <!-- Registration Number input field -->
       <!-- Pattern attribute ensures the registration number follows a YEAR-COUNTY-NUMBER format-->
        <!-- YEAR: 2 or 3 digits, COUNTY: 1 or 2 uppercase letters, NUMBER: 1 to 5 digits -->
       <p><label for = "RegistrationNumber"> Registration Number</label>
       <input type="text" name="RegistrationNumber" pattern="[0-9]{2,3}-[A-Z]{1,2}-[0-9]{1,5}" title="Format is 261-CW-123" autocomplete=off required/>
    </p>
    <!-- Car Type input field -->
     <p>
        <label for="CarTypeId">Car Type</label>
        <select name="CarTypeId" id="CarTypeId" required>
            <option value="" disabled selected>Select Car Type</option>
            <?php
            include 'AddNewCarListbox.php';
            ?>
            </select>
        </p>
        
        <!-- Colour input field -->
         <p>
            <label for="Colour">Colour</label>
            
            <select name="Colour" id="Colour" required>
                <option value="" disabled selected>Select Colour</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Silver">Silver</option>
                <option value="Blue">Blue</option>
                <option value="Red">Red</option>
                <option value="Green">Green</option>
            </select>
        
        </p>
        
        <!-- Chassis Number input field -->
         <p><label for="ChassisNumber">Chassis Number</label>
         <input type="text" name="ChassisNumber" id="ChassisNumber" required/>
        </p>
        
        <!-- Body Style input field -->
         <p><label for="BodyStyle">Body Style</label>
         <select name="BodyStyle" id="BodyStyle" required>
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
    
    </p>
    
    <!-- Number of Doors input field -->
     <p><label for="NumberOfDoors">Number of Doors</label>
     <input type="number" name="NumberOfDoors" min="1" max="10" id="NumberOfDoors" required/>
    </p>
    
    <!-- Purchase Price input field -->
     <p><label for="PurchasePrice">Purchase Price</label>
     <input type="number" name="PurchasePrice" steps="0.1" min="0" id="PurchasePrice" required/>
    </p>
    
    <!-- Date Added to Fleet input field -->
     <p><label for="DateAddedToFleet">Date Added to Fleet</label>
     <input type="date"  name="DateAddedToFleet" id="DateAddedToFleet" value="<?= date('Y-m-d') ?>" required/>
    </p>
    <br>
    
    <!-- Submit and Reset button field -->
     <input class="submit" type="submit" value = "Submit"/>
     <input class="reset" type="reset" value="Clear"/>
    </form>
	</div>
	</div>
</body>
</html>


