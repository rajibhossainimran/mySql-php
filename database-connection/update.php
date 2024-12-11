<?php 

$db = mysqli_connect("localhost", "root", "", "demo_database");

// If the 'updateid' parameter is set, fetch the record to be updated
if (isset($_GET["updateid"])) {
    $update_id = $_GET['updateid'];
    $sql = "SELECT * FROM student WHERE your_id = $update_id";
    $updateData = mysqli_query($db, $sql);
    $update = mysqli_fetch_assoc($updateData);
    $id = $update['your_id'];
    $name = $update['name'];
    $email = $update['email'];
}

// Handle the form submission when the user clicks 'Update'
if (isset($_POST["btnUpdate"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Perform the update query
    $updateQuery = "UPDATE student SET name = '$name', email = '$email' WHERE your_id = $id";
    
    if (mysqli_query($db, $updateQuery)) {
        // Redirect to a success page or display a success message
        header("location:dbConnection.php");
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($db) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            section {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <section>
        <h1>Update Your Data</h1>
        <form action="" method="post">
            <label for="id">USER ID</label>
            <input type="text" value="<?php echo $id; ?>" name="id" id="id" placeholder="Enter your id" required><br>

            <label for="name">Name</label>
            <input type="text" value="<?php echo $name; ?>" name="name" id="name" placeholder="Enter your name" required><br>

            <label for="email">Email</label>
            <input type="email" value="<?php echo $email; ?>" name="email" id="email" placeholder="Enter your email" required><br>

            <button type="submit" name="btnUpdate">Update</button>
        </form>
    </section>
</body>
</html>
