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
  $city = htmlentities($_POST['city']);
  $state = htmlentities($_POST['state']);
  $date = htmlentities($_POST['date']);
  $time = htmlentities($_POST['time']);
?>

<!-- Input form -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Title</td>
      <td>City</td>
      <td>State</td>
	  <td>Date(YYYYMMDD)</td>
	  <td>Time</td>

    </tr>
    <tr>
      <td>
        <input type="text" name="title" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="city" maxlength="20" size="30" />
      </td>
      <td>
        <input type="text" name="state" maxlength="10" size="30" />
      </td>
	  <td>
        <input type="text" name="date" maxlength="20" size="30" />
      </td>
	  <td>
        <input type="text" name="time" maxlength="20" size="30" />
      </td>
	  <td>
        <input type="submit" value="Search" />
      </td>
	</tr>
	<tr>
	  <td></td><td></td>
	  <td>
	  </td>
	  <td>
		<select name="dateComp">
		   <option value="=">equal</option>
		   <option value="<">before</option>
		   <option value=">">after</option>
		</select> 
	  </td>
	  <td>
	  <!--
		<select name="timeComp">
		   <option value="=">equal</option>
		   <option value="<">before</option>
		   <option value=">">after</option>
		</select> 
		-->
	  </td>
    </tr>
  </table>
</form>


<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
	<td>Details</td>
    <td>Title</td>
    <td>City</td>
	<td>State</td>
	<td>Date</td>
	<td>Time</td>
  </tr>

<?php
$counter = 0;
$query = "SELECT * FROM Showtimes";
if (strlen($title) || strlen($city) || strlen($state) || strlen($date) || strlen($time)) {
    $query = $query . " WHERE ";
	//concat title
	if (strlen($title)){
		$query = $query . " ( ";
		$q = "SELECT movieID FROM Movies WHERE title LIKE '%" . $title . "%'";
		$movie_id_list = mysqli_query($connection, $q);
		$mcounter = 0;
		//echo $q;
		while($res = mysqli_fetch_row($movie_id_list)){
			if ($mcounter > 0){$query = $query . " OR ";}
			$query = $query . "movieID = " . $res[0];
			$mcounter++;
		}
		$query = $query . " ) ";
		$counter++;
	}
	//concat city
	if (strlen($city)){
		$q = "SELECT locationID FROM Locations WHERE city LIKE '%" . $city . "%'";
		//echo $q . "<br>";
		$cid = mysqli_fetch_row(mysqli_query($connection, $q))[0];
		if($counter){$query = $query . " AND ";}
		$query = $query . "locationID = " . $cid;
		$counter++;
	}
	//concat state
	if (strlen($state)){
		if($counter){$query = $query . " AND ";}
		$query = $query . " ( ";
		$q = "SELECT locationID FROM Locations WHERE state LIKE '%" . $state . "%'";
		$location_id_list = mysqli_query($connection, $q);
		$scounter = 0;
		while($res = mysqli_fetch_row($location_id_list)){
			if ($scounter > 0){$query = $query . " OR ";}
			$query = $query . "locationID = " . $res[0];
			$scounter++;
		}
		$query = $query . " ) ";
		$counter++;
	}
	//concat date
	if (strlen($date)){
		if($counter){$query = $query . " AND ";}
		//$query = $query . "releaseDate LIKE '%" . $releaseDate . "%'";
		$query = $query . "date ". $_POST['dateComp'] . $date;
		$counter++;
	}
	//concat runTime
	if (strlen($time)){
		if($counter){$query = $query . " AND ";}
		$query = $query . "startTime LIKE '%". $time . "%'";
		$counter++;
	}
	$query = $query . ";";
  }
  
$result = mysqli_query($connection, $query); 
echo $query;
echo "<br><br>Found " . $result->num_rows . " results!";
while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  
  $mname = mysqli_fetch_row(mysqli_query($connection, "SELECT title FROM Movies WHERE movieID = " . $query_data[1]))[0];
  $loc = mysqli_fetch_row(mysqli_query($connection, "SELECT city,state FROM Locations WHERE locationID = " . $query_data[2]));
  //$cname = mysqli_fetch_row(mysqli_query($connection, "SELECT city FROM Locations WHERE locationID = " . $query_data[2]))[0];
  echo "<td><a href='show.php?id=".$query_data[0]."'>Details</a></td>";
  echo "<td><a href='movie.php?id=".$query_data[1]."'>",$mname, "</a></td>",
		"<td>",$loc[0], "</td>",
		"<td>",$loc[1], "</td>",
	   "<td>",$query_data[3], "</td>",
	   "<td>",$query_data[4], "</td>";
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


