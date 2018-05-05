<?php 
$conn = new PDO('mysql:host=localhost:3308;dbname=teste', 'root', 'root');

$user_id = $_GET['id'];

$stmt = $conn->prepare('DELETE FROM user_color WHERE user_id = :user_id');
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$stmt = $conn->prepare('DELETE FROM users WHERE id = :id');
$stmt->bindParam(':id', $user_id);
$stmt->execute();

$redirect = "http://localhost:8000";
header("location:$redirect");
?>