<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display product</title>
  
</head>
<body>
        <div>
            <a href="manufacture.php">insert</a>
        </div>
    <div class="table-container">
        <h2>Product Information</h2>
        <table>
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>Brand</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $db = mysqli_connect("localhost", "root", "", "product2");

                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $user = $db->query("SELECT * FROM display_product");
                    $counter = 1;
                    while (list($brand, $address, $contact, $product_name, $price) = $user->fetch_row()) {
                        if($price>5000){
                            echo "<tr>
                            <td>$counter</td>
                            <td>$brand</td>
                            <td>$address</td>
                            <td>$contact</td>
                            <td>$product_name</td>
                            <td>$price</td>
                            <td><a href='delete.php'>delete</a></td>
                        </tr>";
                        $counter++;
                        }
                        
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

</body>
</html>
