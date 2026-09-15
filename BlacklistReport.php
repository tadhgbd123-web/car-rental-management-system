<!--Tadhg Brennan
    C00308963
    24/03/2026
    Blacklist report screen for car rental project -->
    <!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="Style.css">
        </head>
        <body>
            <div class="navbar">
            <a href="index.html">Home</a>
            <a href="BlacklistReport.php">Blacklist Report</a>
            <img src="logo.png" alt="My Logo" class="logo">
            </div>

    <h1>Blacklist Report</h1>
    <h3>(Click  a button to see the Blacklist Report in the desired order)</h3>

    <form name="reportForm" method="post">
    <input type="hidden" name="choice">

    <!-- When this button is clicked, it runs the dateOrder() JS function which sorts by DoB -->
		<div class=button>
    <input type = 'button' id = "dateButton" value = 'Date Order'
        onclick='dateOrder()' title = 'Click here to see Blacklisted Companies in order of Date Ordered'>

        <!-- When this button is clicked, it runs the surnameOrder() JS function which sorts by surname -->
        <input type = 'button' id = 'companyButton' value = 'Company Order'
        onclick = 'companyOrder()' title = 'Click here to see Blacklisted Companies in order of Company Name'>

        <input type = 'button' id = 'amountButton' value = 'Amount Order'
        onclick='amountOrder()' title = 'Click here to see Blacklisted Companies in order of Amount'>
		</div>
        <br>
        <br>
        <script>
            // Functions to run when the date button is pressed
            function dateOrder()
            {
                // Stores dateOrder in hidden field
                document.reportForm.choice.value = "Date";
                // submits to PHP
                document.reportForm.submit();
            }
            // Functions to run when the Company button is pressed
            function companyOrder()
            {
                // Stores company in hidden field
                document.reportForm.choice.value = "Company";
                // submits to PHP
                document.reportForm.submit();
            }
            // Functions to run when the amount button is pressed
             function amountOrder()
            {
                // Stores Amount in hidden field
                document.reportForm.choice.value = "Amount";
                // submits to PHP
                document.reportForm.submit();
            }
            </script>
            </form>

    <?php
    
    // database connection details
    include 'db.inc.php';


               // When the page is first loaded, the default choice will be Date
               $choice = "Date";    // in case this is the first time through and $_POST[choice] hasnt been set

               // Check if the form was submitted
               if (ISSET($_POST['choice']))
               {
                   // gets the users selected choice
                   $choice = $_POST['choice'];
               }

               if ($choice == "Date")
               {
                $order = "DateBlacklisted DESC";
                ?>
                <script>
                    document.getElementById("dateButton").disabled = true;
                    document.getElementById("companyButton").disabled = false;
                    document.getElementById("amountButton").disabled = false;
                </script>
                <?php
               }
               else if ($choice == "Company")
               {
                $order = "Company.Name ASC";
                ?>
                <script>
                    document.getElementById("dateButton").disabled = false;
                    document.getElementById("companyButton").disabled = true;
                    document.getElementById("amountButton").disabled = false;
                </script>
                <?php
               }
               else
               {
                $order = "AmountOwedAtBlacklistDate DESC";
                ?>
                <script>
                    document.getElementById("dateButton").disabled = false;
                    document.getElementById("companyButton").disabled = false;
                    document.getElementById("amountButton").disabled = true;
                </script>
                <?php
               }

    // Create SQL Query to retrieves all columns from  BlacklistEpisodes(*)
    // and the CompanyName field from the Company Table by joining the BlacklistEpisode and Company tables
    $sql = "SELECT BlacklistEpisode.*, Company.Name AS CompanyName FROM BlacklistEpisode
        JOIN Company ON BlacklistEpisode.CompanyID = Company.CompanyID
        WHERE DateRemoved IS NULL
        ORDER BY $order";



// Executes the query and loops to check for query errors
    if (!$result = mysqli_query($con, $sql))
    {
        die('Error in database querying ' . mysqli_error($con));
    }

    // Get the number of rows returned
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0)
    {
        echo "No companies are currently blacklisted.";
    }
    else
    {
        // Code for table format
        echo "<table border='1'>";
        echo 
        "<tr>
            <th>Company</th>
            <th>Date</th>
            <th>Amount</th>
        </tr>";

        while ($row = mysqli_fetch_array($result))
        {
            $date = date("d-m-Y", strtotime($row['DateBlacklisted']));

            echo 
            "<tr>
                <td>{$row['CompanyName']}</td>
                <td>{$date}</td>
                <td>{$row['AmountOwedAtBlacklistDate']}</td>
            </tr>";
            
        }
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($con);
    //Go back to the calling - form with the values we need to diplay in session variables, if a record was found
    // or alternatively use the following
    // echo "<script>window.location.href='view.html.php';</script>";
    ?>
