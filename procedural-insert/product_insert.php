<?php
$db = mysqli_connect("localhost","root","","products_data");
if(isset($_POST["btnSubmit"])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $db->query("call brand_insert('$name','$contact')");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <label for="name">Name :</label>
            <input type="text" name="name"><br>


            <label for="phone">Contact :</label>
            <input type="text" name="contact"><br>

            <button type="submit" name="btnSubmit">submit</button>
        </form>
    </section>
<br><br><br>
    <section>
        <h1>PRODUCT TABLE</h1>
        <form action="" method="post">
            <label for="name">Brand Name :</label>
            <input type="text" name="bname"><br>


            <label for="phone">price :</label>
            <input type="number" name="bprice"><br>

            <label for="manufac">Manufactuce:</label>
                <select name="manufac">
                <?php 
                $manufac = $db ->query("select * from brand");
                while(list($_bid,$_bname)=$manufac->fetch_row()){
                    echo"<option value = '$_bid'>$_bname</option>";
                }
                ?>
                </select><br>


            <button type="submit" name="btnProduct">submit</button>
        </form>
    </section>
</body>
</html>