<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function generateUserID() {
    $timestamp = time();

    $uniqueID = uniqid($timestamp, true);

    $user_id = substr($uniqueID, -6);

    return $user_id;
}

function validateInput($username, $password) {
    // Check if either username or password is empty
    if (empty($username) || empty($password)) {
        return "Both username and password are required.";
    }

    // Check if both username and password are at least 6 characters long
    if (strlen($username) < 6 || strlen($password) < 6) {
        return "Username and password must be at least 6 characters long.";
    }

    // Check if the username has at least 1 capital letter
    if (!preg_match('/[A-Z]/', $username)) {
        return "Username must contain at least 1 capital letter.";
    }

    // Check if the username has at least 1 special character
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $username)) {
        return "Username must contain at least 1 special character.";
    }

    // If all checks pass, return true to indicate validation success
    return true;
}