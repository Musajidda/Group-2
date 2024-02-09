<?php
$servername = "localhost";
$username = "root";
$password = "Moussamj9$";
$dbname = "groupWork";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['deleteUserId'])) {
    $deleteUserId = $_POST['deleteUserId'];

    // Prepare and execute the deletion query
    $stmt = $conn->prepare("DELETE FROM userForm WHERE id = ?");
    $stmt->bind_param("i", $deleteUserId);

    if ($stmt->execute()) {
        // Redirect back to the tableForm.php page after deletion
        header("Location: tableForm.php");
        exit();
    } else {
        // Handle deletion error
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "User ID is required";
}

$conn->close();
?>
