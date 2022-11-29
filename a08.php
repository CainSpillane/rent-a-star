<!DOCTYPE html>
<!-- a08-Spillane.php      Lab 8 HTML Reference
10/21/2022 AT ORIGINAL PROGRAM
-->

<html lang=en>

<head>
	<Title> A08 - Spillane</Title>
	<h1> A08 - Spillane </h1>
	<h2> This PHP Program creates a FIZZ/BUZZ table </h2>
	<meta charset="utf-8">
	
	<style>
	.td {background-color:lightgreen}
	
	.fizz {background-color:lightblue}
	
	.buzz {background-color:pink}
	
	</style>
		
</head>

<body>

	
<?php

echo "

	<table border='1'>
	<th style='background-color:grey; color:white;'> Number </th>
	<th style='background-color:grey; color:white;'> Fizz </th>
	<th style='background-color:grey; color:white;'> Buzz </th>";
	
	for ($x=1; $x <= 50; $x++) {
		if (($x%3 == 0) && ($x%5==0)) {
			echo "
			<tr>
			<td class='td'> $x </td>
			<td class='fizz'> FIZZ</td>
			<td class='buzz'> BUZZ </td>
			</tr>";}
		elseif ($x%3 ==0) {
			echo "
			<tr>
			<td class='td'> $x </td>
			<td class='fizz'> FIZZ</td>
			<td class='td'> </td>
			</tr>";}
		
		elseif ($x%5 ==0) {
			echo "
			<tr>
			<td class='td'> $x </td>
			<td class='td'> </td>
			<td class='buzz'> BUZZ </td>
			</tr>";}
			
		else {
			echo "
			<tr>
			<td class='td'> $x </td>
			<td class='td'> </td>
			<td class='td'> </td>
			</tr>";}
		
	}

echo '</table>';


?>

	<br>
	<footer>
		<small> This page © by E. Spillane, 2022 </small>
	</footer>

</body>
</html>