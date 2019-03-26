<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>SER 322 - Group 9</h1>
<a href="movies.php">Movies</a> &#9679 <a href="actors.php">Actors</a> &#9679 <a href="directors.php">Directors</a> &#9679 <a href="nominations.php">Nominations</a> &#9679 <a href="shows.php">Shows</a>
<hr>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the Directors table. */
  $firstName = htmlentities($_POST['firstName']);
  $lastName = htmlentities($_POST['lastName']);
  $birthDate = htmlentities($_POST['birthDate']);
  $nationality = htmlentities($_POST['nationality']);

  
?>

<!-- Input form -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Birth Date</td>
      <td>Nationality</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="firstName" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="lastName" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="birthDate" maxlength="10" size="30" />
      </td>
      <td>
        <input type="text" name="nationality" maxlength="20" size="30" />
      </td>
      <td>
        <input type="submit" value="Search" />
      </td>
    </tr>
  </table>
</form>

<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
	<td>Details</td>
    <td>FirstName</td>
    <td>LastName</td>
    <td>BirthDate</td>
    <td>Nationality</td>
	<td>Edit</td>
  </tr>

<?php
$counter = 0;
$query = "SELECT * FROM Actors";
if (strlen($firstName) || strlen($lastName) || strlen($birthDate) || strlen($nationality)) {
    $query = $query . " WHERE ";
	//concat fname
	if (strlen($firstName)){
		$query = $query . "firstName LIKE '%" . $firstName. "%'";
		$counter++;
	}
	//concat lname
	if (strlen($lastName)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "lastName LIKE '%" . $lastName. "%'";
		$counter++;
	}
	//concat bday
	if (strlen($birthDate)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "birthDate LIKE '%" . $birthDate. "%'";
		$counter++;
	}
	//concat nat
	if (strlen($nationality)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "nationality LIKE '%" . $nationality . "%'";
		$counter++;
	}
	$query = $query . ";";
  }
$result = mysqli_query($connection, $query); 
echo $query;
echo "<br><br>Found " . $result->num_rows . " results!";
while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td><a href='actor.php?id=".$query_data[0]."'>","Details", "</a></td>",
		"<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>",
       "<td>",$query_data[3], "</td>",
       "<td>",$query_data[4], "</td>",
	   "<td><a href='editActor.php?id=".$query_data[0]."'>","Edit", "</a></td>";
  echo "</tr>";
}
?>

</table>
<a href="addActor.php">Click here to add an actor</a>


<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>



