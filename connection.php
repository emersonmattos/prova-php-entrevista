<?php

$user = "root";
$pass = "root";
$host = "localhost:3308";
$db   = "teste";

try {

    //$connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn = new PDO('mysql:host=localhost:3308;dbname=teste', 'root', 'root');
    
    
    //var_dump($connection);

    $users      = $conn->query('SELECT * from users');

    $users->setFetchMode(PDO::FETCH_INTO, new stdClass);

    foreach($users as $user) {

        echo sprintf("<li>ID %s - NAME: %s / EMAIL: %s</li>",
                        $user->id, $user->name, $user->email);

    }

    $con = null;

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}