<?php include "dbconn.php" ?>

<?php 

if(isset($_POST['transfer']))
{
    function function_alert($errors){
        //Display alert
        echo "<script>alert('$errors');";
        echo "window.location.href= 'viewUsers.php' ";
        echo "</script>";
    }

    session_start();
    $from_id = trim($_POST['from-transfer']);
    $to_id = trim ($_POST['to-user']);
    $credits = trim($_POST['credits']);
    $error = false;

    //From User Query

    $from_query = "SELECT * FROM users where Id= '$from_id'";
    $from_result = mysqli_query($con,$from_query);
    $row_from = mysqli_fetch_assoc($from_result);
    $from_name = $row_from['Name'];

    $from_creditdb = $row_from['Credit'];

    //To User Query

    $to_query = "SELECT * FROM users WHERE Id= '$to_id' ";
    $to_result = mysqli_query($con,$to_query);
    $row_to = mysqli_fetch_assoc($to_result);
    $to_name = $row_to['Name'];

    $to_creditdb = $row_to['Credit'];

    if((int)$credits > (int)$from_creditdb)
    {
        $errors ="Insufficient Balance in users account";
        $error = true;
    }

    if(!$error)
    {
        $current_date = date("Y-m-d H:i:s");

        //update from user credits
        $from_user_finalCredit = "UPDATE users SET Credit = Credit - $credits WHERE Id= $from_id";

        $query = mysqli_query($con,$from_user_finalCredit);

        if(!$query)
        {
            die("QUERY FAILED!".mysqli_error($con));
            echo("Error Description: ".$mysqli->error);
        }

        //update to user credits

        $to_user_finalCredit = "UPDATE users SET Credit = Credit + $credits WHERE Id= $to_id";

        $query = mysqli_query($con,$to_user_finalCredit);
        
        $query1 = "INSERT INTO transferrecord(From_User,To_User,CreditTransfered,DateTime) VALUES('$from_name','$to_name','$credits','$current_date')";

        $res2 = mysqli_query($con,$query1);
        
        if($res2)
        {
            $user1 = "SELECT * FROM users WHERE id='$from_id' OR id='$to_id'";
            $res=mysqli_query($con,$user1);
            $row_count=mysqli_num_rows($res);
        }
        else
        {
            die("QUERY FAILED".mysqli_error($con));
            echo("Error description: " . $mysqli -> error);
        }
    }
    else
    {
        function_alert("Insufficient Credit Balance!!Please Try Again");
    }



}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/transfercredit_style.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>Transfer Result</title>
</head>
<body>
<header>
        <div class ="row">
        <nav>
                    <ul class ="users-navbar">
                        <li><a class="nav-link" href="Homepage.php">home</a></li>
                        <li><a class="nav-link" href="transferhistory.php">transfer history</a></li>
                       <!-- <li><a class="nav-link" href="#">transfer</a></li>   --->
                    </ul>
                </nav>

        </div>

    </header>

    <div class="success-msg">
    <div class ="row">
        <i class ="fa fa-check"></i>
            <i>credit successfully transfered!</i>
        </div>
    </div>
    <div class ="row">
        <h2>Post-Transfer Details</h2>
        <?php
            echo "<table id=\"my_table\" border='1'>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email Id</th>
            <th>Final Credit</th>
            </tr>";

            while($row = mysqli_fetch_assoc($res))
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
        <div class ="return-to-users-div">
    <a class="btn-ghost" href = "viewUsers.php">Return to Users</a>
    </div>
</div>
    
</body>
</html>