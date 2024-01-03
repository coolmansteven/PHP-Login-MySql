# PHP-Login-MySQL

This repository contains a simple PHP login system using MySQL for user authentication. The system consists of several files, each serving a specific purpose.

## Files Overview:

### 1. `signup.php`
- Users are directed here from the login page if they don't have an account.
- Ensures the created account has a valid username and password.
- Inserts user data into the MySQL database.

### 2. `login.php`
- Reads from the MySQL database to check if there is a match for the user input.
- Redirects to the index page upon successful login.

### 3. `index.php`
- Simple example index page with a welcome message for the user.
- Includes a logout button in the top navigation bar.

### 4. `logout.php`
- Ends the user's session and redirects to the login page when the logout button is pressed.

### 5. `functions.php`
- Stores functions necessary for checking user data and other PHP elements.
- Includes functionality for assigning a user ID.

### 6. `connection.php`
- Connects the user to the MySQL database for reading and writing information.

## Setting Up the Database Locally:

1. Install XAMPP or a similar local server environment that includes MySQL and Apache web server.

2. Start the MySQL and Apache servers in XAMPP.

3. Open your web browser and navigate to `localhost/phpmyadmin`.

4. Create a new database; in this example, it is named `login_sample_db`.

5. Create a table within the database with the following structure:
   - `id`: big int (auto-increment, primary key)
   - `user_id`: big int
   - `user_name`: varchar
   - `password`: varchar
   - `date`: timestamp

6. After setting up the database and placing the files in the correct `xampp/htdocs` folder, navigate to the browser and type `localhost/login/index.php` to access the functional site.

Feel free to customize the instructions based on your specific setup and requirements. Happy coding!
