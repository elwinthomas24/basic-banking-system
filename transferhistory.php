<?php include "dbconn.php" ?>

<?php 

$query = "SELECT * FROM transferrecord";
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/transferhistory_style.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>Transfer History</title>
</head>
<body>
<header>
        <div class ="row">
        <nav>
                    <ul class ="users-navbar">
                        <li><a class="nav-link" href="Homepage.php">home</a></li>
                        <li><a class="nav-link" href="viewUsers.php">View Users</a></li> 
                       <!-- <li><a class="nav-link" href="#">transfer</a></li>   --->
                    </ul>
                </nav>

        </div>

    </header>

<div class="row">
        <div class="main-heading">
            <h2>Transfer History</h2>
</div>
	<div class ="transfer-table">
			<?php
				
				echo "<table id=\"my_table3\" border='1'>
				<tr>
				<th>Id</th>
				<th>Sender</th>
				<th>Recipient</th>
				<th>Amount Transfered</th>
				<th>Date & Time</th>
				</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . $row['Id'] . "</td>";
				echo "<td>" . $row['From_User'] . "</td>";
				echo "<td>" . $row['To_User'] . "</td>";
				echo "<td>" . $row['CreditTransfered'] . "</td>";
				echo "<td>" . $row['DateTime'] . "</td>";
				echo "</tr>";
				echo "</tbody>";
				}
				echo "</table>";
			?>
			</div>
		</div>
    
    
</body>

<div class="fixed-footer">
        <div class="container">
            Copyright &copy 2021 Banking System by Elwin Thomas
    </div>
</div>
</html>