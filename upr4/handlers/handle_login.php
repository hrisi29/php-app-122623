<?php
require_once('../functions.php');
require_once('../db.php');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// да проверим дали потребителя съществува
$sql = "SELECT * FROM users WHERE email = '$email'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch();

if(!$user){
    header('Location: ../index.php?page=login&error=Грешен имейл или парола!');
    exit;
}else{
    if(password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['names'];
        $_SESSION['email'] = $user['email'];
        setcookie('last_login', $user['email'], time() + 3600, '/', 'localhost', false, true); // 1 hour	  
        header('Location: ../index.php?page=home');
        exit;
      
   }else{
        header('Location: ../index.php?page=login&error=Грешен имейл или парола!');
        exit;
    }
}
?>