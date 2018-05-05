<?php
if (isset($_POST['name']) && isset($_POST['email'])) {
    $conn = new PDO('mysql:host=localhost:3308;dbname=teste', 'root', 'root');
    
    $stmt = $conn->prepare('INSERT INTO users (name, email) VALUES(:name, :email)');
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email']
    ));
    $user_id = $conn->lastInsertId();
    if (isset($_POST['colors'])) {
        foreach ($_POST['colors'] as $color) {
            $stmt = $conn->prepare('INSERT INTO user_color (user_id, color_id) VALUES(:user_id, :color_id)');
            $stmt->execute(array(
                ':user_id' => $user_id,
                ':color_id' => $color
            ));
        }
    }
}

$redirect = "http://localhost:8000";
header("location:$redirect");

?>