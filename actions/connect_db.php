<?php
	$host = 'localhost';
	$dbName = 'db_productentry';
	$userName = 'root';
	$pwd = '';
	/*Connection*/
$dbCon = mysqli_connect($host, $userName, $pwd, $dbName);
@define('BASE', "http://localhost:80/Lab_WebDb/sudha/");
@define('categories',array(
	"Book","Electronics","Food","Toys"
));
?>