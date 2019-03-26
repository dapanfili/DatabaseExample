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
  //save if POST is not empty
  if (!empty($_POST['fname'])) {
	
	//update info
	$query = "UPDATE Actors SET" .
	" firstName = '" . $_POST['fname'] . "'" .
	", lastName = '" . $_POST['lname'] . "'" .
	", birthDate = '" . $_POST['dob'] . "'" .
	", nationality = '" . $_POST['nat'] . "'" .
	" WHERE actorID = " . $id;
	echo $query . "<br>";
	mysqli_query($connection, $query);
	
	//update movies
	$query = "DELETE FROM ActorsToMovies WHERE actorID = " . $id;
	mysqli_query($connection, $query);
	for($i = 0; $i < 5; $i++){
		if($_POST['movies' . $i] > -1){
			$query = "INSERT INTO ActorsToMovies (actorID, movieID) VALUES (" . $id . "," . $_POST['movies' . $i] . ");";
			mysqli_query($connection, $query);
		}
			
	
	}
  }
  
  
   //get basic actor info
	
	$query = "SELECT * FROM Actors WHERE actorID = " . $id .";";
	//echo $query;
	$result = mysqli_query($connection, $query);
	
	$query_data = mysqli_fetch_row($result);
	
	echo "<form action='editActor.php?id=". $id ."' method='POST'>";
	
	echo "<br><input type='text' name = 'fname' maxlength='20' size='30' value='",$query_data[1], "'/>"; 
	echo "<input type='text' name = 'lname' maxlength='20' size='30' value='",$query_data[2], "'/>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>DOB: </td><td>","<input type='text' name = 'dob' maxlength='20' size='30' value='",$query_data[3], "'/>"," Must be YYYYMMDD format</td>";
	echo "</tr><tr>";
	echo "<td>Nationality: </td><td>",  "<input type='text' name = 'nat' maxlength='20' size='30' value='",$query_data[4], "'/>", "</td>";
	echo "</tr>";
	echo "</table>";
	
	//get movie info
	$movie_list_result = mysqli_query($connection, "SELECT movieID FROM ActorsToMovies WHERE actorID = " . $id); 
	$movie_counter =0;
	echo "<h3><u>Movies</u></h3>";
	
	
	while($movieID = mysqli_fetch_row($movie_list_result)) {
		$movie_result = mysqli_query($connection, "SELECT movieID,title FROM Movies WHERE movieID = " . $movieID[0]); 
		$movie_query_data = mysqli_fetch_row($movie_result);
		$all_movie_list_result = mysqli_query($connection, "SELECT movieID,title FROM Movies where movieID <> " . $movie_query_data[0]);
		echo "<select name='movies" . $movie_counter . "'>";
		echo "<option value='",$movie_query_data[0],"'>",$movie_query_data[1],"</option>";
		echo "<option value='-1'></option>";
		while($movie_to_add = mysqli_fetch_row($all_movie_list_result)) {
			echo"<option value='",$movie_to_add[0],"'>",$movie_to_add[1],"</option>";
		}
		echo "</select><br>";
		$movie_counter++;
		
	}
	
	while($movie_counter < 5) {
		$all_movie_list_result = mysqli_query($connection, "SELECT movieID,title FROM Movies");
		echo "<select name='movies" . $movie_counter . "'>";
		echo "<option value = '-1'></option>";
		while($movie_to_add = mysqli_fetch_row($all_movie_list_result)) {
			echo"<option value='",$movie_to_add[0],"'>",$movie_to_add[1],"</option>";
		}
		echo "</select><br>";
		$movie_counter++;
		
	}
	echo "<br><br><input type='submit' value='Save'/>";
	echo "</form>";
	
	echo "<form action='deleteActor.php?id=" . $id . "' method='POST'>";
	echo "<input type='submit' value='DELETE'/></form>";

?>

