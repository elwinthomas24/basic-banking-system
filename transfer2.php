<?php include "dbconn.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="resources/css/transfer2_style.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>Transaction</title>
</head>
<body>
<header>
        <div class ="row">
        <nav>
                    <ul class ="users-navbar">
                        <li><a class="nav-link" href="index.php">home</a></li>
                        <li><a class="nav-link" href="transferhistory.php">transfer history</a></li>
                       <!-- <li><a class="nav-link" href="#">transfer</a></li>   --->
                    </ul>
                </nav>

        </div>

    </header>

    <?php
        if(isset($_POST['from-user']))
        {
            //Session start
            session_start();
            $_SESSION['from-user'] = $_POST['from-user'];

        }



    ?>

<?php
	if(isset($_GET['errors'])){
		$error=$_GET['errors'];
		echo "<div class='alert alert-danger'>
            $error</div>";
			
	}
	if(isset($_GET['success'])){
		$success= $_GET['success'];
		echo "<div class='alert alert-success'>
           $success</div>";
    }?>

<form method ="POST" action ="transfercredit.php">
    
    <div class ="row">
        <div class="main-heading">
            <h1 >TRANSFER CREDITS</h1>
        </div>
        <h2>Credits transfered from:</h2>
        <?php
            $txt = $_POST['from-user'];
            $query = "SELECT * FROM users WHERE Id =".$txt;
            $result = mysqli_query($con,$query);

            echo "<table id=\"my-table\" border = 1>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Available Credits</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
				echo "<td>" . $row['Id'] . "</td>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Credit'] . "</td>";
				echo "</tr>";
            }
            echo "</table>";

        ?>

</div>  
    <div class ="row">

    <h2>Transfer to: </h2>
    <div class="select-bar">
    <select class="to-user-select" required name ="to-user" id ="listu2">
    <option value="">Select User</option>
    <?php
        $txt = $_POST['from-user'];
        $query = "SELECT * FROM users where Id!='".$txt."'";
        $result = mysqli_query($con,$query);

        while($row= mysqli_fetch_array($result))
        {?>
        <option value="<?php echo $row['Id']; ?>">
        <?php 
        echo $row['Name'];
        echo" ";
        echo " - ";
        echo $row['Credit'];
        ?>
        </option>
        <?php
        }
        
    ?>
    </select>
    </div>
        </div>

        <div class = row>
            <div class ="pay-amount">
            <h2>Amount</h2>
        </div>
        <input type="text" id="amt" name="credits" required="required">
        <input name="from-transfer" type="hidden" value="<?php echo $txt;?>">
        <br>
        <br>
        <br>
        <div class="btn-div">
        <button class ="transfer-button" name ="transfer" onclick="myfunction()">Transfer Credits</button>
    </div>
    </div>

        </form>

    
</body>
<div class="fixed-footer">
        <div class="container">
            Copyright &copy 2021 Banking System by Elwin Thomas
    </div>
</div>
</html>