<!Doctype html>
<!-- -->

<html lang="en">

	<head>
		<title> RentAStar Homepage</title>
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

				echo "<h1 style= 'text-align:center;'> RentAStar </h1>";


				require "connect_aws.php";
				echo "<h2 style= 'text-align:center;'> Stars </h2>";
				
				if (ISSET($_POST['sort'])) {
					$sort_type = "ORDER BY " . $_POST['sort'];
					$sort_type2 = $_POST['sort2'];
				}
				else {
					$sort_type = "";
					$sort_type2 = "";
				}
					
				echo "<table class='table1'>
				<th style='background-color:blue; color:white;'> Star ID </th>	
				<th style='background-color:blue; color:white;'> Star Name </th>
				<th style='background-color:blue; color:white;'> Declination </th>
				<th style='background-color:blue; color:white;'> Distance </th>
				<th style='background-color:blue; color:white;'> Rigth Ascension </th>
				<th style='background-color:blue; color:white;'> Star Owner </th>
				<th style='background-color:blue; color:white;'> Active? </th>"; " >";
				 
				$q = "SELECT * FROM t8_stars $sort_type $sort_type2" ;
				$r = mysqli_query ( $dbc , $q );
				while($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {echo "<tr style='padding:6px;'>";
				echo " <td style='padding:6px;'> " . $row[0] . " </td> <td style='padding:6px;'> " . $row[1] . " </td> <td style='padding:6px;'> " .$row[2] . " </td> <td> "
				. $row[3] . " </td> <td style='padding:6px;'> " .$row[4] . " </td> <td style='padding:6px;'> " .$row[5] . " </td> <td style='padding:6px;'> "
				.$row[6] ."</td>"; echo "</tr>";
				mysqli_error( $dbc ) . "done" ;
					}
				echo "</table>";
				
				echo "<center>";
				echo "<form action='' method='POST'>";
				echo "<input type='radio' name='sort' value='trans_id' style='color:white'> ID NUM";
				echo "<input type='radio' name='sort' value='star_id' style='color:white'> Star ID ";
				echo "<input type='radio' name='sort' value='u_id' style='color:white'> User ID ";
				echo "<input type='radio' name='sort' value='date_processed' style='color:white'> Timestamp ";
				echo "<br>";
				echo "<input type='radio' name='sort2' value='ASC' style='color:white'> Ascending ";
				echo "<input type='radio' name='sort2' value='DESC' style='color:white'> Descending ";
				echo "<br> <input type='submit' value='Sort It!' style='background-color:blue; color:white'>";
				echo "</form>";
				echo "</center>";
					
								
				include "footer.php";
?> 
</body>

</html>