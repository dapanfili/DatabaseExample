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
	$query = "SELECT * FROM Movies WHERE MovieID = " . $id;
	echo $query;
	$result = mysqli_query($connection, $query); 
	$movie_query_data = mysqli_fetch_row($result);
	
	
	//get genre name
	$genre_result = mysqli_query($connection, "SELECT genreDescription FROM Genres WHERE genreID = " . $movie_query_data[2]); 
	$genre_query_data = mysqli_fetch_row($genre_result);
	$genre_name = $genre_query_data[0];
	
	//get director name
	$director_result = mysqli_query($connection, "SELECT directorID,firstName,lastName FROM Directors WHERE directorID = " . $movie_query_data[3]); 
	$director_query_data = mysqli_fetch_row($director_result);
	$director_id = $director_query_data[0];
	$director_fname = $director_query_data[1];
	$director_lname = $director_query_data[2];
	
	echo "<h2>",$movie_query_data[1],"</h2>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>Genre: </td><td>",$genre_name,"</td>";
	echo "</tr><tr>";
	echo "<td>Director: </td><td>", "<a href='director.php?id=" . $director_id . "'>" . $director_lname . ", " . $director_fname . "</a></td>";
	echo "</tr><tr>";
	echo "<td>Release Date: </td><td>",$movie_query_data[4],"</td>";
	echo "</tr><tr>";
	echo "<td>Run Time: </td><td>",$movie_query_data[5],"</td>";
	echo "</tr><tr>";
	echo "<td>Rating: </td><td>",$movie_query_data[6],"</td>";
	echo "</tr>";
	echo "</table>";
	
	//get actor info
	$actor_list_result = mysqli_query($connection, "SELECT actorID FROM ActorsToMovies WHERE movieID = " . $id); 
	echo "<h3><u>Actors</u></h3>";
	while($actorID = mysqli_fetch_row($actor_list_result)) {
		$actor_result = mysqli_query($connection, "SELECT actorID,firstName,lastName FROM Actors WHERE actorID = " . $actorID[0] . ";"); 
		$actor_query_data = mysqli_fetch_row($actor_result);
		echo "<a href='actor.php?id=".$actorID[0]."'>", $actor_query_data[1], " ", $actor_query_data[2],"</a><br>";
	}
	
	//get nomination info
	$nom_list_result = mysqli_query($connection, "SELECT nominationID,type,result FROM Nominations WHERE movieID = " . $id); 
	if($nom_list_result){
		echo "<h3><u>Awards</u></h3>";
		echo "<table border='1' cellpadding='2' cellspacing='2'>";
		echo "<tr><td>Award</td><td>Result</td></tr>";
		while($nom = mysqli_fetch_row($nom_list_result)) {
			echo "<tr>";
			echo "<td> <a href=\"nomination.php?id='".$nom[1]."'\">", $nom[1],"</a></td>",
			"<td>", $nom[2],"</td>";
			"</tr>";
		}
		echo "</table>";
	}
	
?>