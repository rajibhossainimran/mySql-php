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
    <title>Form Design</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 500px;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .form-container form {
            width: 100%;
        }

        .form-container section {
            margin-bottom: 40px;
        }

        .separator {
            text-align: center;
            margin: 20px 0;
            color: #777;
        }

    </style>
</head>
<body>

    <!-- Personal Info Form -->
    <section>
        <h1>Personal Information</h1>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" required><br>

            <button type="submit" name="btnSubmit">Submit</button>
        </form>
    </section>

    <div class="separator">or</div>

    <!-- Product Form -->
    <section>
        <h1>Product Information</h1>
        <form action="" method="post">
            <label for="bname">Brand Name:</label>
            <input type="text" name="bname" required><br>

            <label for="bprice">Price:</label>
            <input type="number" name="bprice" required><br>

            <label for="manufac">Manufacturer:</label>
            <select name="manufac" required>
                <?php 
                $manufac = $db->query("SELECT * FROM brand");
                while(list($_bid, $_bname) = $manufac->fetch_row()){
                    echo "<option value='$_bid'>$_bname</option>";
                }
                ?>
            </select><br>

            <button type="submit" name="btnProduct">Submit</button>
        </form>
    </section>

</body>
</html>
