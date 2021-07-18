<?php
session_start();
require_once ("connect_db.php");
if (isset($_POST['btnEdit']) == "Add") {
	$id = $_POST['pId'];	
	$name = $_POST['pName'];	
	$desc = $_POST['pDesc'];	
	$price = $_POST['pUnitPrice'];	
	$cat = $_POST['pCategory'];	
	/*Update into tbl_info*/
	$updtSQL= "INSERT INTO `products`(`pName`, `pDesc`, `pUnitPrice`, `pCategory`) VALUES ('$name','$desc','$price','$cat')";
	$updtQry = @mysqli_query($dbCon,$updtSQL) or die("Error in Table Info Update: ".mysqli_error($dbCon));
	/*Success or Error Message*/
	if($updtQry){
		$_SESSION['msg'] = "<h4 style='color:blue'>Data Succefully Added</h4>";
	}else{
		$_SESSION['msg'] = "<h4 style='color:red'>Not Added</h4>";
	}
	header('Location:'.BASE);
}
?>