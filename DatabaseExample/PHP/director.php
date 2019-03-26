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

   //get basic actor info
	$id = $_GET["id"];
	$query = "SELECT * FROM Directors WHERE directorID = " . $id .";";
	echo $query;
	$result = mysqli_query($connection, $query);
	
	$query_data = mysqli_fetch_row($result);
	
	
	echo "<h2>",$query_data[1], " ", $query_data[2], "</h2>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>DOB: </td><td>",$query_data[3],"</td>";
	echo "</tr><tr>";
	echo "<td>Nationality: </td><td>", $query_data[4], "</td>";
	echo "</tr>";
	echo "</table>";
	
	//get movie info
	$movie_list_result = mysqli_query($connection, "SELECT movieID, title FROM Movies WHERE directorID = " . $id); 
	
	echo "<h3><u>Movies</u></h3>";
	while($movieID = mysqli_fetch_row($movie_list_result)) {
		echo "<a href='movie.php?id=".$movieID[0]."'>", $movieID[1], "</a><br>";
	}
	
?>