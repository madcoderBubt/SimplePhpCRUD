<?php 
	session_start();
    require_once('actions/connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New</h1>
    <a href="about.html">About Us</a> | <a href="index.php">Home</a>
    <hr>
    <h3 style="color:brown"><?php 
        if(@$_SESSION['msg']!=""){
            echo @$_SESSION['msg'];
            echo @$_SESSION['msg']="";
        }
    ?></h3>
    <form action="actions/create.php" method="post">
        <input type="text" name="pId" id="pId" value="0" disabled><br/>
        <select name="pCategory" id="pCategory">
            <option value="" selected>Select Category</option>
            <?php foreach (categories as $item) {
                echo "<option value='$item'>$item</option>";
            }?>
        </select><br/>
        <input type="text" name="pName" id="pName" placeholder="Name" ><br/>
        <input type="number" name="pUnitPrice" id="pUnitPrice" placeholder="Price" ><br/>
        <textarea name="pDesc" id="pDesc" cols="30" rows="10" placeholder="Description"></textarea><br/>
        <input type="submit" name="btnEdit" value="Add"> <input type="reset" value="Reset">
    </form>

</body>
</html>