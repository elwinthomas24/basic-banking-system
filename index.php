<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(









<!---

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet" type="text/css">
    <title>Home Page</title>
</head>
<body>
<header>
        <div class ="row">
        <div class="logo">
                <img src="resources/img/tsf_logo_full.png" class="logo-img">

            </div>
            
            <nav>
            <ul class = "home-navbar">
               <li><a class = "nav-link" href="#">CONTACT</a></li> 
               <li><a class ="nav-link" href="#">ABOUT</a></li>
            </ul>
            </nav>

        </div>
        <div class= "row">
            <div class= "main-heading">
            <h1>Welcome to The Sparks Foudation Bank</h1>
            <div class="second-msg">
            <h3><i>We're glad to have you here.</i></h3>
        </div>
            <div class = "btn">
                <div class= "btn-get-started">
            <a class = "btn-full" href="viewUsers.php">GET STARTED</a>
            </div>
            </div>
            </div>
            
        </div>
        <div class= "row">
           
        </div>

    </header>
   
    
</body>
<div class ="fixed-footer">
    <div class="container">Copyright    &copy;    2021   Banking System  by  Elwin   Thomas
</div>
</div>

    </html>  --->