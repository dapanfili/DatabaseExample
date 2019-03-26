<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>SER 322 Group 9</h1>
<a href='movies.php'>Movies</a> &#9679 <a href="actors.php">Actors</a> &#9679 <a href="directors.php">Directors</a> &#9679 <a href="nominations.php">Nominations</a> &#9679 <a href="shows.php">Shows</a>
<hr>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);
	$id = $_GET["id"];
	$id = str_replace("'", "", $id);
	echo "<h2>",$id,"</h2>";
	echo "<h3><u>Nominations</u></h3>";
	//echo "SELECT movieID FROM Nominations WHERE type = '" . $id . "' AND result = 'Lost'<br>";
	//get movie info
	$movie_list_result = mysqli_query($connection, "SELECT movieID FROM Nominations WHERE type = '" . $id . "' AND result = 'Lost'"); 
	if(count($movie_list_result) > 0){
		while($movieID = mysqli_fetch_row($movie_list_result)[0]) {
			$mname = mysqli_fetch_row(mysqli_query($connection, "SELECT title FROM Movies WHERE movieID = " . $movieID))[0];
			echo "<a href='movie.php?id=".$movieID."'>", $mname,"</a><br>";

		}
		echo "</table>";
	}
	
	echo "<h3><u>Wins</u></h3>";
	
	//get movie info
	//echo "SELECT movieID FROM Nominations WHERE type = '" . $id . "' AND result = 'Won'<br>";
	$movie_list_result = mysqli_query($connection, "SELECT movieID FROM Nominations WHERE type = '" . $id . "' AND result = 'Won'"); 
	if(count($movie_list_result) > 0){
		while($movieID = mysqli_fetch_row($movie_list_result)[0]) {
			$mname = mysqli_fetch_row(mysqli_query($connection, "SELECT title FROM Movies WHERE movieID = " . $movieID))[0];
			echo "<a href='movie.php?id=".$movieID."'>", $mname,"</a><br>";

		}
		echo "</table>";
	}
	
?>