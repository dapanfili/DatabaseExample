<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>SER 322 Group 9</h1>
<a href='movies.php'>Movies</a> &#9679 <a href="actors.php">Actors</a> &#9679 <a href="directors.php">Directors</a> &#9679 <a href="nominations.php">Nominations</a> &#9679 <a href="shows.php">Shows</a>
<hr>
<?php

	
	echo "<form action='addActorToDB.php' method='POST'>";
	
	echo "<br><table border = 0><tr><td>First Name</td><td>Last Name</td><tr><td><input type='text' name = 'fname' maxlength='20' size='30' value=''/></td>"; 
	echo "<td><input type='text' name = 'lname' maxlength='20' size='30' value=''/></td></tr></table>";
	echo "<h3><u>Info</u></h3>";
	echo "<table border = 0>";
	echo "<tr>";
	echo "<td>DOB: </td><td>","<input type='text' name = 'dob' maxlength='20' size='30' value=''/>"," Must be YYYYMMDD format</td>";
	echo "</tr><tr>";
	echo "<td>Nationality: </td><td>",  "<input type='text' name = 'nat' maxlength='20' size='30' value=''/>", "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' value='Submit'/></form>";
	

?>

