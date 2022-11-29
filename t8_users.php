<!DOCTYPE html>
<!-- team8_users.php
		11/1/22 KW Original Program-->
	<html lang="en">
	
	<head>
		<title> Rent-A-Star </title>
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

		<main>
			<?php

			define("FILE_AUTHOR", "K Wright");

			echo "<h1> Users </h1>";

			require "connect_aws.php";
			
			if (ISSET($_POST['sort'])) {
						$sort_type = "ORDER BY " . $_POST['sort'];
						$sort_type2 = $_POST['sort2'];
					}
					else {
						$sort_type = "";
						$sort_type2 = "";
					}

			echo "<table class='table1'>";
					echo "<th> User ID </th>";
					echo "<th> User Type </th>";
					echo "<th> Username </th>";
					echo "<th> Password </th>";
					echo "<th> Password Change </th>";
					echo "<th> Email </th>";
					echo "<th> First Name </th>";
					echo "<th> Last Name </th>";
					echo "<th> Account Active? </th>";
			
			
				$q = "SELECT * FROM t8_users $sort_type $sort_type2" ;
				$r = mysqli_query ( $dbc , $q );
				while($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {echo "<tr style='padding:6px;'>";
					echo " <td style='padding:6px;'> " . $row[0] . " </td> <td style='padding:6px;'> " . $row[1] . " </td> <td style='padding:6px;'> " .$row[2] . " </td> <td> "
					. $row[3] . " </td> <td style='padding:6px;'> " .$row[4] . " </td> <td style='padding:6px;'> " .$row[5] . " </td> <td style='padding:6px;'> "
					.$row[6] ."</td>" . " <td style='padding:6px;'> " . $row[7] . "</td>" . " <td style='padding:6px;'> " . $row[8] . "</td>";
					echo "</tr>";
					mysqli_error( $dbc ) . "done" ;
					}
				echo "</table>";
					
			echo "<form action='' method='POST'>";
					echo "<br> <input type='submit' value='Sort It!' style='background-color:blue; color:white'>";
					echo "<input type='radio' name='sort' value='u_id' style='color:white'> User ID";
					echo "<input type='radio' name='sort' value='user_type' style='color:white'> User Type ";
					echo "<input type='radio' name='sort' value='user_username' style='color:white'> Username ";
					echo "<input type='radio' name='sort' value='user_password' style='color:white'> Password ";
					echo "<input type='radio' name='sort' value='user_pass_change' style='color:white'> Last Password Change ";
					echo "<input type='radio' name='sort' value='user_email' style='color:white'> Email ";
					echo "<input type='radio' name='sort' value='user_fname' style='color:white'> First Name ";
					echo "<input type='radio' name='sort' value='user_lname' style='color:white'> Last Name";
					echo "<br>";
					echo "<input type='radio' name='sort2' value='ASC' style='color:white'> Ascending ";
					echo "<input type='radio' name='sort2' value='DESC' style='color:white'> Descending ";
					echo "</form>";
					
			include "footer.php";
			?> 

		</main>
	</body>

</html>