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
	$query = "SELECT * FROM Actors WHERE actorID = " . $id .";";
	echo $query;
	$result = mysqli_query($connection, $query);
	
	$query_data = mysqli_fetch_row($result);
	
	
	echo "<h2>",$query_data[1], " ", $query_data[2], "</h2>";
	echo "<a href='editActor.php?id=".$query_data[0]."'>(edit)</a><br>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>DOB: </td><td>",$query_data[3],"</td>";
	echo "</tr><tr>";
	echo "<td>Nationality: </td><td>", $query_data[4], "</td>";
	echo "</tr>";
	echo "</table>";
	
	//get movie info
	$movie_list_result = mysqli_query($connection, "SELECT movieID FROM ActorsToMovies WHERE actorID = " . $id); 
	//$movie_list_query_data = mysqli_fetch_row($movie_list_result);
	
	echo "<h3><u>Movies</u></h3>";
	while($movieID = mysqli_fetch_row($movie_list_result)) {
		$movie_result = mysqli_query($connection, "SELECT movieID,title FROM Movies WHERE movieID = " . $movieID[0]); 
		$movie_query_data = mysqli_fetch_row($movie_result);
		echo "<a href='movie.php?id=".$movie_query_data[0]."'>", $movie_query_data[1], "</a></br>";
	}
	
?>