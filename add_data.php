<?php
include('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbhost = DBHOST;
$dbuser = DBUSER;
$dbname = DBNAME;
$dbpass = DBPASS;

$dbh = new PDO(sprintf('mysql:host=%s;dbname=%s', $dbhost, $dbname), $dbuser, $dbpass);


if ($_GET) {
	if(isset($_GET["create_table"])) {
		$dbh->query("CREATE TABLE `$dbname`.`table1` ( `id` INT NOT NULL AUTO_INCREMENT , `number` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;");
		$dbh->query("CREATE TABLE `$dbname`.`table2` ( `id` INT NOT NULL AUTO_INCREMENT , `number` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
		$dbh->query("CREATE TABLE `$dbname`.`table3` ( `id` INT NOT NULL AUTO_INCREMENT , `number` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = ARCHIVE;");
	}
	if(isset($_GET["rem_data"])) {
			$dbh->query("TRUNCATE TABLE table1 ");
			$dbh->query("TRUNCATE TABLE table2 ");
			$dbh->query("TRUNCATE TABLE table3 ");

	}
	if(isset($_GET["add_data"])) {
		$p = $_GET["data"];
		for ($i = 1; $i <= $p; $i++) {
			$dbh->query("INSERT INTO `table1` (`id`, `number`) VALUES (NULL, $i )");
			$dbh->query("INSERT INTO `table2` (`id`, `number`) VALUES (NULL, $i )");
			$dbh->query("INSERT INTO `table3` (`id`, `number`) VALUES (NULL, $i )");
		 }
	}


}





$dbh = null;
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data</title>
</head>
<body>

	<form action="" method="get">
	<h2>Create Tables</h2> <br>
	 	<input type="hidden" name="create_table" value="1">
		<button type="submit">CREATE</button>
	</form>

	<form action="" method="get">
	<h2>Remove Datas</h2> <br>
	 	<input type="hidden" name="rem_data" value="1">
		<button type="submit">REMOVE DATAS</button>
	</form>


	<form action="" method="get">
	<h2>Add Data to Tables</h2> <br>
	 	<input type="hidden" name="add_data" value="1">
		<label for="data">Data</label>
		<input id="data" type="number" name="data" value="20000">
 		<br> <br>
		<button type="submit">SEND</button>

	</form>








	<style>
	form {
		margin:50px;padding:30px;border: 1px dashed #ccc;float:left;display:block;
	}
	</style>

</body>
</html>

