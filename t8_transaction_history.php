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
	
	<main>
			<?php
					define("FILE_AUTHOR", "E Spillane");
			
					echo "<Header> <h1 style='color:#ededed; text-align: center;'> RentAStar </h1> <br> <h1 style='color:#ededed; text-align: center;'> Transaction History </h1> </Header>";
										
					require "connect_aws.php";



					if (ISSET($_POST['sort'])) {
						$sort_type = "ORDER BY " . $_POST['sort'];
						$sort_type2 = $_POST['sort2'];
					}
					else {
						$sort_type = "";
						$sort_type2 = "";
					}
					
					
					echo "<table  class='table1' " /* border='2' style='padding:6px; padding-right: 6px; padding-left: 6px; padding-top: 6px; padding-bottom: 6px;'*/ . " >";
					echo "<th style='padding:10px;'> Transaction ID	</th>";
					echo "<th style='padding:10px;'> Star ID	</th>";
					echo "<th style='padding:10px;'> User ID	</th>";
					echo "<th style='padding:10px;'> Card Information	</th>";
					echo "<th style='padding:10px;'> Transaction Amount	</th>";
					echo "<th style='padding:10px;'> Address	</th>";
					echo "<th style='padding:10px;'> Timestamp	</th>";

					
					$q = "SELECT * FROM t8_trans_history $sort_type $sort_type2" ;
					$r = mysqli_query ( $dbc , $q );
					while($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {echo "<tr style='padding:6px;'>";
						echo " <td style='padding:6px;'> " . $row[0] . " </td> <td style='padding:6px;'> " . $row[1] . " </td> <td style='padding:6px;'> " .$row[2] . " </td> <td> "
						. $row[3] . " </td> <td style='padding:6px;'> " .$row[4] . " </td> <td style='padding:6px;'> " .$row[5] . " </td> <td style='padding:6px;'> "
						.$row[6] ."</td>"; echo "</tr>";
						mysqli_error( $dbc ) . "done" ;
						}
					echo "</table>";
					
					echo "<form action='' method='POST'>";
					echo "<br> <input type='submit' value='Sort It!' style='background-color:blue; color:white'>";
					echo "<input type='radio' name='sort' id='idnum' value='trans_id' style='color:white'> ID number";
					echo "<input type='radio' name='sort' value='star_id' style='color:white'> Star ID ";
					echo "<input type='radio' name='sort' value='u_id' style='color:white'> User ID ";
					echo "<input type='radio' name='sort' value='date_processed' style='color:white'> Timestamp ";
					echo "<br>";
					echo "<input type='radio' name='sort2' value='ASC' style='color:white'> Ascending ";
					echo "<input type='radio' name='sort2' value='DESC' style='color:white'> Descending ";
					echo "</form>";
					
					include "footer.php";

										
				?>
			</main>

		</body>
		
</html>