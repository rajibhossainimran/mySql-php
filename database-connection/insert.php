<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        section {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #4CAF50;
            background-color: #ffffff;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsive design */
        @media (max-width: 480px) {
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
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>

            <button type="submit" name="btnInsert">Insert</button>
        </form>
    </section>
</body>
</html>
