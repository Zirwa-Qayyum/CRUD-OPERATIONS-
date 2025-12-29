<?php
// Database credentials (same as above)
$host = 'localhost';
$dbname = 'user_db';
$username = 'root';
$password = '';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid ID.";
    exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Delete query
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    echo "User deleted successfully! <a href='manage.php'>Back to Manage Users</a>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>