<?php 
	session_start();
	require_once('actions/connect_db.php');
	$updtID=$_GET['id']; 
	$sqlQuery = "SELECT * FROM Products WHERE pId='$updtID'";
	$sqlQueryData = mysqli_query($dbCon,$sqlQuery);
	$recItem = mysqli_fetch_object($sqlQueryData);	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Product</h1>
    <a href="about.html">About Us</a> | <a href="index.php">Home</a>
    <hr>
    <h3 style="color:brown"><?php 
        if(@$_SESSION['msg']!=""){
            echo @$_SESSION['msg'];
            echo @$_SESSION['msg']="";
        }
    ?></h3>
    <form action="actions/update.php" method="post">
        <input type="hidden" name="pId" id="pId" value="<?php echo $recItem->pId; ?>"><br/>
        <select name="pCategory" id="pCategory">
            <option value="" selected>Select Category</option>
            <?php foreach (categories as $item) {
                $temp="";
                if($item==$recItem->pCategory) $temp = "selected";
                echo "<option value='$item' $temp>$item</option>";
            }?>
        </select><br/>
        <input type="text" name="pName" id="pName" placeholder="Name" value="<?php echo $recItem->pName; ?>"><br/>
        <input type="text" name="pUnitPrice" id="pUnitPrice" placeholder="Price" value="<?php echo $recItem->pUnitPrice; ?>"><br/>
        <textarea type="text" name="pDesc" id="pDesc" placeholder="Description" ><?php echo $recItem->pDesc; ?></textarea><br/>
        <input type="submit" name="btnEdit" value="Update"> <input type="reset" value="Reset">
    </form>

</body>
</html>