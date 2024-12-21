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
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            color: #333;
            transition: border 0.3s;
        }

        select:focus {
            border-color:rgb(219, 66, 5);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(231, 32, 5);
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(151, 35, 0);
        }

        button:active {
            background-color:rgb(231, 46, 0);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            section {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            label {
                font-size: 1rem;
            }

            select, button {
                font-size: 1rem;
            }
        }
    </style>
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
