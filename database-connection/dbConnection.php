<?php
// $hostname="localhost";
// $user = "root";
// $password ="";
// $dbname = "db_name";
// $connection = mysqli_connect("localhost", "root", "","demo_database");

// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connected successfully";
// }


// delete method added 
$db = mysqli_connect("localhost","root", "","demo_database");
if(isset($_GET["deleteid"])){
    $delete_id = $_GET['deleteid'];
    $sql = "DELETE FROM student WHERE id =$delete_id ";
    if(mysqli_query($db, $sql)==true){
        header("location:dbConnection.php");
}}

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
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Delete</th>
        
    </tr>
    <?php 
    $db = mysqli_connect("localhost","root", "","demo_database");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $user = $db->query("select * from student");
          while(list($id,$name, $email) = $user->fetch_row()) {
        echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td><a href='dbConnection.php?deleteid=$id'>Delete</a></td>
       </tr> ";
    }
    }
    
    ?>
</table>

</body>
</html>