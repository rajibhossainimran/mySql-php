<?php
// $hostname="localhost";
// $user = "root";
// $password ="";
// $dbname = "db_name";
$connection = mysqli_connect("localhost", "root", "","demo_database");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Table Example</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>User Information</h2>
<?php 
$db = mysqli_connect("localhost","root", "","demo_database");
?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <?php 
    $user = $db->query("select * from student");
    while(list($id,$name, $email) = $user->fetch_row()) {
        echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
        ";
    }
    ?>
</table>

</body>
</html>
