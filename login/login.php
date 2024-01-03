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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			$error_message = "Wrong username or password!";
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
	<title>Login</title>
</head>
<body>

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

	<div id="box">
		
		<form method="post">
		<div style="font-size: 20px; margin-bottom: 20px; color: #333;">Login</div>

		<input id="text" type="text" name="user_name" placeholder="Username"><br>
		<input id="text" type="password" name="password" placeholder="Password"><br>

		<input id="button" type="submit" value="Login"><br>

		<a id="login-link" href="signup.php">Click to Signup</a><br>

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