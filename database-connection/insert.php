<?php 
$dababase =mysqli_connect("localhost","root","","demo_database");
if(isset($_POST["btnInsert"])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO student(your_id,name, email) VALUES ('$id','$name','$email')";
    if(mysqli_query($dababase,$sql)){
        echo "data insert";
        header("location:dbConnection.php");
    }else{
        echo "not insert";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
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
        <h1>Insert Your Data</h1>
        <form action="" method="post">
            <label for="id">USER ID</label>
            <input type="text" name="id" id="id" placeholder="Enter your id" required><br>

            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>

            <button type="submit" name="btnInsert">Insert</button>
        </form>
    </section>
</body>
</html>

