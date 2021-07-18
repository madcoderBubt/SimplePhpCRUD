<?php
session_start();
require_once ("connect_db.php");
if (isset($_POST['btnEdit']) == "Update") {
	$id = $_POST['pId'];	
	$name = $_POST['pName'];	
	$desc = $_POST['pDesc'];	
	$price = $_POST['pUnitPrice'];	
	$cat = $_POST['pCategory'];		
	/*Update into tbl_info*/
	$updtSQL= "UPDATE `products` SET `pName`='$name',`pDesc`='$desc',`pUnitPrice`='$price',`pCategory`='$cat' WHERE `pId`='$id'";
	$updtQry = @mysqli_query($dbCon,$updtSQL) or die("Error in Table Info Update: ".mysqli_error($dbCon));
	/*Success or Error Message*/
	if($updtQry){
		$_SESSION['msg'] = "<h4 style='color:blue'>Data Succefully Updated</h4>";
	}else{
		$_SESSION['msg'] = "<h4 style='color:red'>Not Updated</h4>";
	}
	header('Location: '.BASE);
}
?>