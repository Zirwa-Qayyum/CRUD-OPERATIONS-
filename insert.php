<?php
// Database credentials (update these)
$host = 'localhost';
$dbname = 'user_db';
$username = 'root';  // Default for XAMPP
$password = '';      // Default for XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash password

        // Insert query
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $pass]);

        echo "Registration successful! <a href='register.html'>Register another user</a> or <a href='manage.php'>Manage users</a>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>