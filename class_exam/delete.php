<?php 
$db = mysqli_connect("localhost","root","","product2");
if(isset($_POST["btndelete"])){
    $nanuf = $_POST['manuf'];
    $db->query("DELETE FROM manufacturer WHERE id = $nanuf");
    header("location:display.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Manufacturer</title>
 
</head>
<body>

<section>
    <h1>Delete Manufacturer</h1>
    <form action="" method="post">
        <label for="manuf">Select Manufacturer:</label>
        <select name="manuf" required>
            <?php 
            $manufaclist = $db->query("SELECT * FROM manufacturer");
            while(list($_bid, $_bname) = $manufaclist->fetch_row()){
                echo "<option value='$_bid'>$_bname</option>";
            }
            ?>
        </select><br>

        <button type="submit" name="btndelete">Delete</button>
    </form>
</section>

</body>
</html>
