<?php
session_start();
require_once ("connect_db.php");
/*DELETE*/
$dltID = $_GET['id'];
$sqlDelt = "DELETE FROM Products WHERE pId='$dltID'";
$status = mysqli_query($dbCon,$sqlDelt);
if($status) $_SESSION['msg'] = "<h4 style='color:blue'>Data Succefully Deleted</h4>";
else $_SESSION['msg'] = "<h4 style='color:red'>Not Deleted</h4>";
header('Location: '.BASE);
?>