<?php  
	require_once('actions/connect_db.php');

    $sqlQuery = "SELECT * FROM Products ";
    $srcText = $srtText = $srtAs = ""; //undefined issues

    if (isset($_POST['btnFlt'])=="Filter Data") {
        //Recieve Data
        $srcText = isset($_POST["srcText"]) ? $_POST["srcText"] : "";
        $srtText = $_POST["sortText"];
        $srtAs = isset($_POST["sortAs"]) ? $_POST["sortAs"] : "";

        $sqlQuery .= "WHERE ( pName like '%$srcText%' OR pCategory like '%$srcText%') ";
        $x = $sqlQuery .= "ORDER By `$srtText` $srtAs";
    }//for filtering
	$items = mysqli_query($dbCon, $sqlQuery);
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
    <code><?php echo $x; ?></code><br>
    <a href="about.html">About Us</a> | <a href="addProduct.php">Add New</a>
    <hr>
    <form action="advanceFunc.php" method="post">
        Search Key: <input type="text" name="srcText" id="srcText" value="<?php echo $srcText; ?>">
        <br>
        <span style="color:brown">* search by name & category only</span>
        <br>
        Sorted By: <select name="sortText" id="sortText">
            <?php foreach (sortingArr as $key => $val) {
                $temp="";
                if($val==$srtText) $temp = "selected";
                echo "<option value='$val' $temp>$key</option>";
            }?>
        </select>
        <br>
        Sorted As: 
            <input type="radio" name="sortAs" value="ASC" id="ASC" > Ascending
            <input type="radio" name="sortAs" value="DESC" id="DESC"> Descending 
        <br>
        <input type="submit" name="btnFlt" value="Filter Data">
    </form>
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
    <script>
        var x = "<?php echo $srtAs; ?>";
        if(x != "") document.getElementById(x).checked = true;
    </script>
</body>
</html>