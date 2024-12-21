<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display product</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .table-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #f1f1f1;
            transition: background-color 0.3s;
        }

        /* Counter Styling */
        td:first-child {
            font-weight: bold;
            color: #555;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 0.8rem;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
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
