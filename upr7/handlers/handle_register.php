<?php

require_once('../functions.php');
require_once('../db.php');

$error = '';
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $error = 'Моля, попълнете всички полета!';
    }
}

if (mb_strlen($error) == 0) {
    $names = $_POST['names'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $repeat_password = $_POST['repeat_password'] ?? '';

    // проверка дали потребителят вече съществува
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if ($row) {
        $error = 'Грешка при регистрация!';
    }
}

if (mb_strlen($error) == 0) {
    // проверка дали паролите съвпадат
    if ($password !== $repeat_password) {
        $error = 'Паролите не съвпадат!';
    }
}

if (mb_strlen($error) > 0) {
    header("Location: ../index.php?page=register&error=$error");
    exit;
} else {
    $hash = password_hash($password, PASSWORD_ARGON2I);
    $sql_insert = "INSERT INTO users (names, email, `password`) VALUES (:names, :email, :hash)";
    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([':names' => $names, ':email' => $email, ':hash' => $hash]);

    if ($stmt_insert) {
        header("Location: ../index.php?page=login");
        exit;
    } else {
        $error = 'Грешка при регистрация!';
        header("Location: ../index.php?page=register&error=$error");
        exit;
    }
}

?>