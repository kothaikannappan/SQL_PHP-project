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

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) die("Couldn't connect to MySQL");
print "Successfully connected to server<p>";

mysqli_select_db($link, $db)
        or die("Couldn't open $db: ".mysqli_error($link));
print "Successfully selected database \"$db\"<p>";
$C_Id = $_POST['C_Id'];
$DATE = $_POST['DATE'];
$Quantity = $_POST['Quantity'];
$total_price = $_POST['total_price'];
$Discount_code = $_POST['Discount_code'];
  $query = "INSERT INTO Transaction (C_Id, DATE, Quantity, total_price, Discount_code) VALUES ('$C_Id','$DATE','$Quantity','$total_price','$Discount_code')";

  $data=mysqli_query($link,$query);
if($data) { echo "You have successfully executed the transaction.";
 }
else
{
echo " The transaction already exist.";
}
// prtable($result);

mysqli_close($link);


print "<p><p>Thank you for adding the transaction";

?>
<p>
<a href="main.php"> Home</a>
</body>
</html>
