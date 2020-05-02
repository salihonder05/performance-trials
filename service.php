<?php
include('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json; charset=UTF-8");

$dbhost = DBHOST;
$dbuser = DBUSER;
$dbname = DBNAME;
$dbpass = DBPASS;

$dbh = new PDO(sprintf('mysql:host=%s;dbname=%s', $dbhost, $dbname), $dbuser, $dbpass);



$sql = "SELECT count(id) FROM `table1` ";
$result = $dbh->prepare($sql);
$result->execute();
$number_of_rows = $result->fetchColumn();

$statement = $dbh->prepare("SELECT * FROM table1");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$key = sha1(serialize($results));

if($_GET) {
	if ($_GET["getQueryID"] == true) {
		$QueryResult = [];
		$QueryResult[0] = ["key" => $key,"status" => true];
		$QueryResult = json_encode($QueryResult);
		print $QueryResult ;
	}
}
else {
	$results[0] = ["key" => $key,"status" => true];
	$json = json_encode($results);
	print $json ;
}



$dbh = null;
?>