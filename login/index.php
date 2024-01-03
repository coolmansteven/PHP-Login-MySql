<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website - Index Page</title>
    <style type="text/css">
        body {
        	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #3498db;
            overflow: hidden;
            color: white;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
			float: left;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar a {
			float: right;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        #logout-link:hover {
            background-color: #2979b5;
          
        }

        .content {
            padding: 20px;
			margin: 0 auto; /* Center-align the content */
            max-width: 800px; /* Set a maximum width for better readability */
        }

		.image-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 200px;
            height: auto;
            margin-right: 20px;
            border-radius: 5px;
        }

        .description-container {
            max-width: 600px;
        }

        .contact-section {
            margin-top: 30px;
			align-items: center;
        }

        .social-button {
            display: inline-block;
            padding: 10px 15px;
            margin-right: 10px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .social-button.facebook {
            background-color: #3b5998;
        }

        .social-button.twitter {
            background-color: #1da1f2;
        }

        .social-button.instagram {
            background-color: #c13584;
        }

        .social-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

    </style>
</head>
<body>

    <div class="navbar">
        <h1>Index Page</h1>
		<a id="logout-link" href="logout.php">Logout</a>
		<a>Hello, <?php echo $user_data['user_name']; ?></a>
    </div>

    <div class="content">
		<div class="image-container">
            <img src="image.png" alt="Image Description">
            <div class="description-container">
                <h2>Image Description</h2>
                <p>In this captivating image from the magical world of Harry Potter, the iconic old flying car, enchanted by Arthur Weasley, hovers gracefully above the enchanting Hogwarts School of Witchcraft and Wizardry. The whimsical scene captures a moment of daring adventure as the enchanted Ford Anglia defies gravity, a key element of the wizarding world's charm and mystery. The juxtaposition of the charming car against the grandeur of Hogwarts creates a sense of magic, transporting viewers into the heart of J.K. Rowling's fantastical universe where the ordinary becomes extraordinary. This image is a testament to the enchanting and timeless allure of the Harry Potter series, captivating fans with its magical imagery and storytelling.</p>
            </div>
        </div>

        <div class="contact-section">
            <h2>Contact Us</h2>
            <a class="social-button facebook" href="#">Facebook</a>
            <a class="social-button twitter" href="#">Twitter</a>
            <a class="social-button instagram" href="#">Instagram</a>
        </div>
    </div>

</body>
</html>