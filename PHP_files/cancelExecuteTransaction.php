<?php
require("/home/student_2018_fall/kk_murugappan/public_html/Assignment5/dbguest.php");
  // function prtable($table) {
  // 	print "<table border=1>\n";
  // 	while ($a_row = mysqli_fetch_row($table)) {
  // 		print "<tr>";
  // 		foreach ($a_row as $field) print "<td>$field</td>";
  // 		print "</tr>";
  // 	}
  // 	print "</table>";
  // };
ini_set('display_errors', '1');
$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) die("Couldn't connect to MySQL");
print "Successfully connected to server<p>";

mysqli_select_db($link, $db)
        or die("Couldn't open $db: ".mysqli_error($link));
print "Successfully selected database \"$db\" - Table Transaction<p>";
$T_id = $_POST['T_id'];

print "Transaction ID: \"$T_id\".";
$queryU = "SELECT DATEDIFF(CURDATE(),DATE) as DAYS FROM Transaction WHERE T_id='$T_id'";
$TDATE = implode(',',mysqli_fetch_assoc(mysqli_query($link, $queryU)));
// echo implode(',', $TDATE);
print("Number of days since transaction: \"$TDATE\"");
 // "\"$TDATE\"";
if ($TDATE >30) {
  echo "The Transaction with ID \"$T_id\" is \"$TDATE\" days old and cannot be deleted.";
} else {
  $query = "DELETE FROM Transaction WHERE T_id= '$T_id'";

  $data=mysqli_query($link,$query);
    if($data) { echo "You have successfully deleted the Transaction.";
}
}


// prtable($result);

mysqli_close($link);


print "<p><p>Thank you for deleting the transaction";

?>
<p>
<a href="main.php"> Home</a>
</body>
</html>
