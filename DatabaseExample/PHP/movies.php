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
  $title = htmlentities($_POST['title']);
  $genreID = htmlentities($_POST['genreID']);
  $directorID = htmlentities($_POST['directorID']);
  $releaseDate = htmlentities($_POST['releaseDate']);
  $runTime = htmlentities($_POST['runTime']);
  $rating = htmlentities($_POST['rating']);
?>

<!-- Input form -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Title</td>
      <td>Genre</td>
      <td>Director</td>
      <td>Release Date(YYYYMMDD)</td>
		<td>Run Time</td>
		<td>Rating</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="title" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="genreID" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="directorID" maxlength="10" size="30" />
      </td>
      <td>
        <input type="text" name="releaseDate" maxlength="20" size="30" />
      </td>
	  <td>
        <input type="text" name="runTime" maxlength="20" size="30" />
      </td>
	  <td>
        <input type="text" name="rating" maxlength="20" size="30" />
      </td>
      <td>
        <input type="submit" value="Search" />
      </td>
	</tr>
	  
	<tr>
	  <td></td><td></td><td></td>
	  <td>
		<select name="releaseComp">
		   <option value="=">on</option>
		   <option value="<">before</option>
		   <option value=">">after</option>
		</select> 
	  </td>
	  <td>
		<select name="timeComp">
		   <option value="=">equal</option>
		   <option value="<">shorter than</option>
		   <option value=">">longer than</option>
		</select> 
	  </td>
	  <td>
		<select name="rateComp">
		   <option value="=">equal</option>
		   <option value="<">lower than</option>
		   <option value=">">higher than</option>
		</select> 
	  </td>
    </tr>
  </table>
</form>


<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
	<td>Details</td>
    <td>Title</td>
    <td>Genre</td>
	<td>Director</td>
	<td>Release Date</td>
	<td>Run Time</td>
	<td>Rating</td>
  </tr>

<?php
$counter = 0;
$query = "SELECT * FROM Movies";
if (strlen($title) || strlen($genreID) || strlen($directorID) || strlen($releaseDate) || strlen($runTime) || strlen($rating)) {
    $query = $query . " WHERE ";
	//concat title
	if (strlen($title)){
		$query = $query . "title LIKE '%" . $title. "%'";
		$counter++;
	}
	//concat genre
	if (strlen($genreID)){
		$q = "SELECT * FROM Genres WHERE genreDescription LIKE '%" . $genreID . "%'";
		//echo $q . "<br>";
		$gid = mysqli_fetch_row(mysqli_query($connection, $q))[0];
		if($counter){$query = $query . " AND ";}
		$query = $query . "genreID = " . $gid;
		$counter++;
	}
	//concat director
	if (strlen($directorID)){
		$q = "SELECT * FROM Directors WHERE lastname LIKE '%" . $directorID . "%'";
		$did = mysqli_fetch_row(mysqli_query($connection, $q))[0];
		if($counter){$query = $query . " AND ";}
		$query = $query . "directorID = " . $did;
		$counter++;
	}
	//concat release
	if (strlen($releaseDate)){
		if($counter){$query = $query . " AND ";}
		//$query = $query . "releaseDate LIKE '%" . $releaseDate . "%'";
		$query = $query . "releaseDate ". $_POST['releaseComp'] . $releaseDate;
		$counter++;
	}
	//concat runTime
	if (strlen($runTime)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "runTime ". $_POST['timeComp'] . $runTime;
		$counter++;
	}
	//concat rating
	if (strlen($rating)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "rating ". $_POST['rateComp'] . $rating;
		$counter++;
	}
	$query = $query . ";";
  }
$result = mysqli_query($connection, $query); 
echo $query;
echo "<br><br>Found " . $result->num_rows . " results!";
while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  $dname = mysqli_fetch_row(mysqli_query($connection, "SELECT lastName FROM Directors WHERE directorID = " . $query_data[3]))[0];
  $gname = mysqli_fetch_row(mysqli_query($connection, "SELECT genreDescription FROM Genres WHERE genreID = " . $query_data[2]))[0];
  echo "<td><a href='movie.php?id=".$query_data[0]."'>","Details", "</a></td>",
		"<td>",$query_data[1], "</td>",
       "<td>",$gname, "</td>",
	   "<td>",$dname, "</td>",
	   "<td>",$query_data[4], "</td>",
	   "<td>",$query_data[5], "</td>",
	   "<td>",$query_data[6], "</td>";
  echo "</tr>";
}
?>

</table>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>


