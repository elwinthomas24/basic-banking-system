<?php include "dbconn.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="resources/css/transfer1_style.css">
    <link rel="stylesheet" type = "text/css" href="resources/css/transfer_queries.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>Select User</title>
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
    <section class="main-body">
        <div class = "row">
            <div class="main-heading">
                <h2>SELECT USER</h2>
            </div>
            <div class ="row fill-up">
            <div class="col span-1-of-3">
                <label>Tranfer From </label>

            </div>  
            
               
            
            <form method ="POST" action ="transfer2.php" class= "from-user-form">
                <select class="from-user-select" required name ="from-user" id="listu1">
                <option value="">Select User</option>
                <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con,$query);

                    while($row= mysqli_fetch_array($result))
                    {
                ?>
                        <option value="<?php echo $row['Id'];?>"> <?php echo $row['Name'];?></option>
                    
                <?php
                    }
                ?>
                </select>
                </div>

                    <br>
                    <div class="row">
                    <div class="btn-submit">
                    <input type = "submit" value ="Submit">
                </div>
                </div>
            </form>
    
        </div>
    </section>
    
</body>
<div class="fixed-footer">
        <div class="container">
            Copyright &copy 2021 Banking System by Elwin Thomas
    </div>
</div>
</html>