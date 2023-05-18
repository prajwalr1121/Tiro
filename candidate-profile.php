<?php
// Database connection details
$host = 'localhost';  // Update with your host
$db = 'loginsystem';  // Update with your database name
$user = 'root';  // Update with your username
$pass = '';  // Update with your password

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Process the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $name = $_POST['first_name'];
        $email = $_POST['last_name'];

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO candidate-profile (first_name, last_name) VALUES (:first_name, :last_name)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<h1>Success</h1>";
            echo "<p>Data stored successfully in the database.</p>";
        } else {
            echo "<h1>Error</h1>";
            echo "<p>Error storing data in the database.</p>";
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>