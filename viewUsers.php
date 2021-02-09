<?php include "dbconn.php" ?>


<?php
    //query to select all users
    $user = "SELECT * FROM users";
    $result = mysqli_query($con,$user);
    $row_count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="resources/css/user_style.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>View Users</title>
</head>
<body>
    <header>
        <div class ="row">
        
        <nav>
                    <ul class ="users-navbar">
                        <li><a class="nav-link" href="index.php">home</a></li>
                        <li><a class="nav-link" href="transferhistory.php">transfer history</a></li>
                        <li><a class="nav-link" href="transfer1.php">transfer</a></li>
                    </ul>
                </nav>

        </div>

    </header>
    <section class ="main-body">
        <div class="row">
            <div class="main-heading">
            <h2>USER DETAILS</h2>
        </div>
</div>
        <br>
        <div class="row">
        <div class="table">
            <?php
            echo "<table id=\"user_table\" border=1>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Current Balance</th>
            </tr>";

            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$row['Id']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Credit']."</td>";
                echo "</tr>";
            }

            echo "</table>";
            
            ?>




        </div>
        <br>
        <br>
    </section>
    
</body>
<div class="fixed-footer">
        <div class="container">
            Copyright &copy 2021 Banking System by Elwin Thomas
    </div>
</div>
</html>