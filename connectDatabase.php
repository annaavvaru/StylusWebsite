<?php  // connectDatabase.php
require_once 'login_avvaru.php'; // remember to change to your lastname
$db_connect = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_connect) die("Unable to connect to MySQL: " . mysqli_error($db_connect));
mysqli_select_db($db_connect, $db_database) or die("Unable to select database: " . mysqli_error($db_connect));
$query = "SELECT * FROM technologies";
$result = mysqli_query($db_connect, $query);
if (!$result) die ("Database access failed: " . mysqli_error($db_connect));
$rows = mysqli_num_rows($result);
for ($j = 0 ; $j < $rows ; ++$j){
	$row = mysqli_fetch_row($result);
	// need to consult table to identify correct index for field
	echo 'javaScript: ' . $row[0] . '<br>';
	echo 'front_end_Frameworks: ' . $row[1] . '<br>';
	echo 'web_applications: ' . $row[2] . '<br>';
	echo 'programming_languages: ' . $row[3] . '<br>';
	echo 'data_bases' . $row[4] . '<br>';
	echo 'web_servers' . $row[5] . '<br><br>';
}
?>
