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

   //get basic movie info
	$id = $_GET["id"];
	$query = "SELECT * FROM Showtimes WHERE showtimeID = " . $id . ";";
	echo $query;
	$result = mysqli_query($connection, $query); 
	$showtime_query_data = mysqli_fetch_row($result);
	

	//get location info
	$location_result = mysqli_query($connection, "SELECT city,state,capacity FROM Locations WHERE locationID = " . $showtime_query_data[2]); 
	$location_query_data = mysqli_fetch_row($location_result);

	//get movie info
	$movie_result = mysqli_query($connection, "SELECT * FROM Movies WHERE movieID = " . $showtime_query_data[1]); 
	$movie_query_data = mysqli_fetch_row($movie_result);
	
	echo "<h2><a href='movie.php?id=",$movie_query_data[0],"'>",$movie_query_data[1],"</a></h2>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>Location: </td><td>",$location_query_data[0], ", ", $location_query_data[1],"</td>";
	echo "</tr><tr>";
	echo "<td>Capacity: </td><td>", $location_query_data[2],"</td>";
	echo "</tr><tr>";
	echo "<td>Date: </td><td>",$showtime_query_data[3],"</td>";
	echo "</tr><tr>";
	echo "<td>Start Time: </td><td>",$showtime_query_data[4],"</td>";
	echo "</tr>";
	echo "</table>";
	

?>