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
	
	//save to db
	$query = "INSERT INTO Actors (firstName, lastName, birthDate, nationality) VALUES (" .
	"'" . $_POST['fname'] . "'" .
	", '" . $_POST['lname'] . "'" .
	", '" . $_POST['dob'] . "'" .
	", '" . $_POST['nat'] . "');";
	echo $query , "<br>";
	$result = mysqli_query($connection, $query);
	//echo $result;
?>

</body>
</html>

