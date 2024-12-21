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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            margin-bottom: 30px;
            transition: transform 0.3s ease-in-out;
        }

        section:hover {
            transform: translateY(-5px);
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        button:hover {
            background-color: #45a049;
        }

        .separator {
            text-align: center;
            margin: 20px 0;
            color: #777;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            section {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            label {
                font-size: 1rem;
            }

            input, select, button {
                font-size: 1rem;
            }
        }
    </style>
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
