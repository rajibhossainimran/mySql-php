<?php
$db = mysqli_connect("localhost", "root", "", "product2");

if (isset($_POST["btnSubmit"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $db->query("call insert_manufacturer('$name','$address','$contact')");
}

if (isset($_POST["btnProduct"])) {
    $name = $_POST['bname'];
    $price = $_POST['bprice'];
    $nanuf = $_POST['manuf'];
    $db->query("call insert_product('$name','$price','$nanuf')");
    header("location:display.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design</title>
</head>
<body>

    <!-- Manufacturer Form -->
    <section>
        <h1>Add Manufacturer</h1>
        <form action="" method="post">
            <label for="name">Manufacturer Name:</label>
            <input type="text" name="name" required><br>

            <label for="address">Address:</label>
            <input type="text" name="address" required><br>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" required><br>

            <button type="submit" name="btnSubmit">Submit</button>
        </form>
    </section>


    <!-- Product Form -->
    <section>
        <h1>Add Product</h1>
        <form action="" method="post">
            <label for="bname">Product Name:</label>
            <input type="text" name="bname" required><br>

            <label for="bprice">Price:</label>
            <input type="number" name="bprice" required><br>

            <label for="manuf">Manufacturer:</label>
            <select name="manuf" required>
                <?php
                $manufaclist = $db->query("SELECT * FROM manufacturer");
                while (list($_bid, $_bname, $_baddress, $_bcontact) = $manufaclist->fetch_row()) {
                    echo "<option value='$_bid'>$_bname</option>";
                }
                ?>
            </select><br>

            <button type="submit" name="btnProduct">Submit</button>
        </form>
    </section>

</body>
</html>
