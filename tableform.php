<?php
$servername = "localhost";
$username = "root";
$password = "Moussamj9$";
$dbname = "groupWork";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM userForm";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableForm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <?php
        if ($result->num_rows > 0) {
          
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>FullName</th><th>Email</th><th>Password</th></tr>";

         
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fullName'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
        ?>
        <br>
        <form action="deleteUser.php" method="post">
            <label for="deleteUserId">Enter User ID to Delete:</label>
            <input type="text" name="deleteUserId">
            <input type="submit" value="Delete User">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
