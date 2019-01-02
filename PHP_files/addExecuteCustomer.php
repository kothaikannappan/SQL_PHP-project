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
print "Successfully selected database \"$db\"<p>";
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$ph_no = $_POST['ph_no'];
$street = $_POST['street'];
$city = $_POST['city'];
$country = $_POST['country'];
$c_type = $_POST['c_type'];

$queryU = "SELECT lname, fname FROM Customer WHERE lname='$lname' AND fname='$fname'";
$OP = mysqli_query($link, $queryU);
$count = mysqli_num_rows($OP);
if ($count !=0) {
  echo "The Customer already exists in the table Customer. the customer is not added to the table Customer";
} else {

$query = "INSERT INTO Customer (lname, fname, ph_no, street, city, country, c_type) VALUES ('$lname','$fname','$ph_no','$street','$city', '$country', '$c_type')";

    $data=mysqli_query($link,$query);
  if($data) { echo "You have successfully added the Customer.";
   }
 }

// prtable($result);

mysqli_close($link);


print "<p><p>Thank you for adding the Customer";

?>
<p>
<a href="main.php"> Home</a>
</body>
</html>
