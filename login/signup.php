<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		$validationResult = validateInput($user_name, $password);

		if($validationResult === true)
		{

			//save to database
			$user_id = generateUserID();
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
            $error_message = $validationResult;
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style type="text/css">
        body {
            background-color: #f0f0f0; /* Background color for the entire page */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* 100% of the viewport height */
            margin: 0;
        }

        #box {
            background-color: #ffffff; /* Background color for the form box */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        #text {
            height: 25px;
            border-radius: 5px;
            padding: 8px; /* Increased padding for better visual */
            border: solid thin #aaa;
            width: 100%;
            margin-bottom: 10px; /* Increased margin between input fields */
        }

        #button {
            padding: 10px;
            width: 100%;
            color: #fff;
            background-color: #3498db; /* Blue color for the button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }

        /* Styling for the link */
        #login-link {
            display: block;
            margin-top: 15px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        #login-link:hover {
            color: #3498db;
        }
        
        .error-message {
            color: red;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin-bottom: 20px; color: #333;">Signup</div>

            <input id="text" type="text" name="user_name" placeholder="Username"><br>
            <input id="text" type="password" name="password" placeholder="Password"><br>

            <input id="button" type="submit" value="Signup"><br>

            <a id="login-link" href="login.php">Click to Login</a><br>

            <?php
            // Display validation error message
                if (isset($error_message)) {
                    echo '<div class="error-message">' . $error_message . '</div>';
                }
            ?>

        </form>
    </div>

</body>
</html>
