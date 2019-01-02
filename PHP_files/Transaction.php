<html>
<head>
<title>
Transaction Table
</title>
</head>
<body>
<?php

function prtable($table) {
	print "<table border=1>\n";
	while ($a_row = mysqli_fetch_row($table)) {
		print "<tr>";
		foreach ($a_row as $field) print "<td>$field</td>";
		print "</tr>";
	}
	print "</table>";
}

//Import Everything that is in dbguest.php
require("/home/student_2018_fall/kk_murugappan/public_html/Assignment5/dbguest.php");

//mysqli_connect() is to connect the database
$link = mysqli_connect($host, $user, $pass, $db);

//Check the connection. Give error message if any error
if (!$link) die("Couldn't connect to MySQL");
// print "Successfully connected to server<p>";

//mysqli_select_db() is used to select the database
mysqli_select_db($link, $db)
	or die("Couldn't open $db: ".mysqli_error($link));

$table = "Transaction";

print "Successfully selected database \"$db\" - Table \"$table\"<p>";

//mysqli_query will execute the query and stores into $result
	$result = mysqli_query($link, "select T_id, C_Id, DATE, Quantity, total_price, Discount_code from $table");

//mysqli_num_rows gives number of rows in the table
$num_rows = mysqli_num_rows($result);

prtable($result);

//Close the connection
mysqli_close($link);

print "<p><p>Sayonara."
?>

<p>
<a href="showTables.php"> Back to List of Tables</a>

<p>


<a href="main.php"> Back to Home Page</a>
</body>

</html>
