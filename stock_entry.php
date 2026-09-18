<?php
include "db.php";

if (isset($_POST['save'])) {

    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $supplier = $_POST['supplier'];
    $date_received = $_POST['date_received'];

    $sql = "INSERT INTO stock 
            (product_name, quantity, unit_price, supplier, date_received)
            VALUES 
            ('$product_name', '$quantity', '$unit_price', '$supplier', '$date_received')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Stock saved successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Stock Entry</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: green;
            color: white;
            border: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Inventory / Stock Entry</h2>

    <form method="POST">

        <label>Product Name:</label>
        <input type="text" name="product_name" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>

        <label>Unit Price:</label>
        <input type="number" name="unit_price" step="0.01" required>

        <label>Supplier:</label>
        <input type="text" name="supplier">

        <label>Date Received:</label>
        <input type="date" name="date_received">

        <button type="submit" name="save">Save Stock</button>

    </form>

</div>

</body>
</html>