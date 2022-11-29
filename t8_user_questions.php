<!DOCTYPE html>
<!-- team8_user_questions.php
		11/3/22 JS Original Program-->
	<html lang="en">
	
	<head>
		<title> Rent-A-Star  </title>
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
		<hr>
		
		<main>
            <h1 style="color: #4485b8; text-align: center;"><img src="RentAStar3.png" width="400" height="400"></h1>
<?php

echo "<center><h1 style='color:white'> Frequently Asked Questions </h1><center>";

require "connect_aws.php";

echo "<table class='table1'>";
	echo "<th style='padding:10px;'> ID #  </th>";
	echo "<th style='padding:10px;'> Questoin </th>";
	echo "<th style='padding:10px;'> Company Reply </th>";
	echo "<th style='padding:10px;'> Active? </th>";

	$q = "SELECT * FROM t8_user_questions" ;
	$r = mysqli_query ( $dbc , $q );
	while($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {echo "<tr style='padding:6px;'>";
		echo " <td style='padding:6px;'> " . $row[0] . " </td> <td style='padding:6px;'> " . $row[1] . " </td> <td style='padding:6px;'> " .$row[2] . " </td> <td> "
		. $row[3] . " </td>"; echo "</tr>";
		mysqli_error( $dbc ) . "done" ;
		}
	echo "</table>";
		
	include "footer.php";

	echo "<br> <br> This is the end of the page";


?> 

		</main>
	</body>

</html>