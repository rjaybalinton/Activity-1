<?php
include 'conn.php'; // Ensure conn.php contains the correct database connection details

// Create
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO car_shop (name, description, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $name, $description, $price, $quantity);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Read
$sql = "SELECT * FROM car_shop";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Error handling if the query fails
}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE car_shop SET name=?, description=?, price=?, quantity=? WHERE id=?");
    $stmt->bind_param("ssdii", $name, $description, $price, $quantity, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM car_shop WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Shop</title>
</head>
<body>
    <h2>Identity of Car</h2>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="submit" name="create" value="Create">
    </form>

    <h2>Products List</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
if ($result) { // Ensure $result is a valid result set
    if ($result->num_rows > 0) { // Check if there are results
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['create']); ?></td>
                <td>
                    <form action="" method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>"> <!-- Ensure htmlspecialchars here too -->
                        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                        <input type="text" name="description" value="<?php echo htmlspecialchars($row['description']); ?>" required>
                        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
                        <input type="number" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>
                        <input type="submit" name="update" value="Update">
                    </form>
                    <a href="?delete=<?php echo htmlspecialchars($row['id']); ?>">Delete</a> <!-- Ensure htmlspecialchars for ID -->
                </td>
            </tr>
        <?php 
        }
    } else {
        // Display message when no records are found
        echo "<tr><td colspan='6'>No records found.</td></tr>";
    }
} else {
    // Display an error message if the query failed
    echo "<tr><td colspan='6'>Error fetching records: " . htmlspecialchars($conn->error) . "</td></tr>";
}
?>
    </table>
</body>
</html>
