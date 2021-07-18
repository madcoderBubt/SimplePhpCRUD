<?php  
	require_once('actions/connect_db.php');
	$sqlQuery = "SELECT * FROM Products";
	$items = mysqli_query($dbCon,$sqlQuery);
	$numData = mysqli_num_rows($items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center">
    <h1>Product List</h1>
    <a href="about.html">About Us</a> | <a href="addProduct.php">Add New</a>
    <hr>
    <h3 style="color:brown"><?php 
        if(@$_SESSION['msg']!=""){
            echo @$_SESSION['msg'];
            echo @$_SESSION['msg']="";
        }
    ?></h3>
    <table class="center">
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php
            $i=0;
            $temp = "";
            if($numData==0) $temp="color:brown"; else{
            while($item = mysqli_fetch_object($items)){   
                $cls = "";
                if($i%2==1) $cls = "bg"; else $cls=""; 
        ?>
        <tr class="<?php echo $cls ?>">
            <td><?php echo $item->pId; ?></td>
            <td><?php echo $item->pName; ?></td>
            <td><?php echo $item->pUnitPrice; ?></td>
            <td><?php echo $item->pDesc; ?></td>
            <td><?php echo $item->pCategory; ?></td>
            <td>
                <a href="editProduct.php?id=<?php echo $item->pId; ?>">Edit</a>
                <a href="actions/delete.php?id=<?php echo $item->pId; ?>">Delete</a>
            </td>
        </tr>
        <?php $i++; }} ?>        
    </table>
    <?php
        echo "<p class='center' style='$temp'>Total Product Found: " . $numData . "</p>";
    ?>
</body>
</html>