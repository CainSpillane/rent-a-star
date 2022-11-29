<!DOCTYPE html>
<!-- transaction-history.php      Team 8 Project - Transaction History
Evan Spillane
11/3/2022 AT ORIGINAL PROGRAM
-->

<head>
	<title > RentAStar Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
	
	<header>
		<nav class="navbar">
			<p><a href="index.html">Home</a></p>
			<p><a href="t8_stars.php">Find a Star!</a></p>
			<p><a href="t8_users.php">Users</a></p>
			<p><a href="t8_transaction_history.php">Transaction History</a></p>
			<p><a href="t8_user_questions.php">User Questions</a></p>
			<p><a href="disclaimer.html">Disclaimer</a></p>
			<p style="text-align: left;"><a href="index.html#AvailableStars">View Available Stars</a></p>
			<p><a href="star_login.php">Log In</a></p>
			<p><a href="star_logout.php">Log Out</a></p>
		</nav>
	</header>
			<h1>Login Page</h1>
			
		<body>
			<main>
			</main>
		</body>
</html>
	
			<?php 

            session_start();

            define("FILE_AUTHOR", "E Spillane");

            if (isset($_SESSION['login_status'])) {
                $login_status = $_SESSION['login_status'];
            } else {
                $login_status = "NOT LOGGED IN";
            }

            include "error_handler.php";

            # validation checking
            if (isset($_POST['userid'])) {
                $userid = $_POST['userid'];
                if ($userid == "") {
                    $error_message = "<p style='color:red'> The username cannot be blank! </p>";
                }

                # checks for alphanumeracy
                if ((!(ctype_alnum($userid))) && ($userid != "")) {
                    $error_message = "<p style='color:red'> The username cannot have special (non-alphanumeric) characters! </p>";
                }
            }

            # validates password input
            if (isset($_POST['password'])) {
                $password = $_POST['password']; 
                if ($password == "") {
                    $error_message = "<p style='color:red'> The password cannot be blank! </p>";
                }

                # checks for alphanumeracy
                if ((!(ctype_alnum($password))) && ($password != "")) {
                    $error_message = "<p style='color:red'> The password cannot have special (non-alphanumeric) characters! </p>";
                }

            }

            require "connect_aws.php";

            # runs the query when fields are filled
            if ((isset($userid)) && (isset($password))) {
                $q = "SELECT * FROM USERS WHERE user_username = \"$userid\" AND user_password = \"$password\"";
                $r = mysqli_query($dbc, $q);
            } else {
                $r = false;
            }

            if ($r) {
                # checks existance of user/password combo in SQL DB
                if (mysqli_num_rows($r) == 0) {
                    if (!(isset($error_message))) {
                        $error_message = "<p style='color:red'> Invalid username/password combination. </p>";
                    }
                } else {
                    # this runs when the username and password match an entry in the database, sets the session login status to "LOGGED IN" before it is echoed out for the first time so that when the user clicks submit, it will say "LOGGED IN" instead of having to wait for a second page refresh
                    $_SESSION['login_status'] = "LOGGED IN";
                    $login_status = "LOGGED IN";
                    # active_user session variable is set so that the page can remember which user is currently logged in when they close the tab and reopen it
                    $_SESSION['active_user'] = $userid;
                }
            } 

            echo "<br> <center><p style='color:white'>$login_status </center></p>";  

            # outputs the form if the page is loaded for the first time or when there is an error message and the user has not logged in yet
            if ((($_SERVER["REQUEST_METHOD"] == "GET") || (isset($error_message))) && ($login_status == "NOT LOGGED IN")) {
                echo "<center><form action = '' method = 'POST'> </center>";
                echo "<center><p style='color:white'> Enter your username </p></center>";
                echo "<center><input type='text' name='userid'> </center>"; 
                echo "<center><p style='color:white'> Enter your password </p></center>";
                echo "<center><input type='password' name='password'></center>";
				echo "<br>";
                echo "<center><br><input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white; font:Helvetica; font-size:20px'></center>";
                echo "</form>";

                if (isset($error_message)) {
                    echo "$error_message";
                }

            }

            # outputs a successful login message when logging in initially
            if (($_SERVER["REQUEST_METHOD"] == "POST") && (!(isset($error_message)))) {
                $_SESSION['login_status'] = "LOGGED IN";
                echo "<br> User $userid successfully logged in!";

            # outputs a successful still logged in message when closing the tab and reopening it, checks if the active_user variable is set because if it didnt, the logged in message would display on the first page load
            } else if (($_SERVER["REQUEST_METHOD"] == "GET") && (!(isset($error_message))) && (isset($_SESSION['active_user']))) {
                $_SESSION['login_status'] = "LOGGED IN";
                echo "<br> <p style='color:white'> User " . $_SESSION['active_user'] . " is still succesfully logged in! </p>";
            }

            include "footer.php";

            ?>