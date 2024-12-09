<?php

require_once('../functions.php');
require_once('../db.php');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// проверим дали потребителят съществува
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: ../index.php?page=login&error=Грешен имейл или парола!');
    exit;
} else {
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['names'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];

        setcookie('last_login', $user['email'], time() + 3600, '/', 'localhost', false, false);

        header('Location: ../index.php?page=home');
        exit;
    } else {
        header('Location: ../index.php?page=login&error=Грешен имейл или парола!');
        exit;
    }
}

?>