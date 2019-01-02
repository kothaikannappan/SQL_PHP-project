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
// if (empty($_POST['title'])) {
//     <?php echo 'Title Cannot be empty';
//   } else {
//     $title = $_POST['title'];
//   };
$title = $_POST['title'];
$Mag_id = $_POST['Mag_id'];
$Volume_id = $_POST['Volume_id'];
$pg_no = $_POST['pg_no'];
$author_id = $_POST['author_id'];

$queryU = "SELECT * FROM Article WHERE title='$title'";
$OP = mysqli_query($link, $queryU);
$count = mysqli_num_rows($OP);
if ($count !=0) {
  echo "The article with title \"$title\" already exists in the table Article.";
} else {
  $query = "INSERT INTO Article (title, Mag_id, Volume_id, pg_no, Author_id) VALUES ('$title','$Mag_id','$Volume_id','$pg_no','$author_id')";
  $data=mysqli_query($link,$query);
  if($data) { echo "You have successfully added the article.";
}
else
{
echo "Sorry, Article could not be added";
}
}
// prtable($result);

mysqli_close($link);


?>
<p>
<a href="main.php"> Home</a>
</body>
</html>
