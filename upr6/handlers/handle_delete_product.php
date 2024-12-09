<?php

require_once('../functions.php');
require_once('../db.php');

// debug($_POST);
// exit;

$id = intval($_POST['product_id'] ?? 0);

if($id<=0){
    $_SESSION['flash']['message']['text'] = "Грешен идентификатор на продукт!";
    $_SESSION['flash']['message']['type'] = 'danger';
    header("Location: ../index.php?page=products");
    exit;
}

$query = "DELETE FROM products WHERE id = :id";
$stmt = $pdo->prepare($query);
if($stmt->execute(['id'=>$id])){
    $_SESSION['flash']['message']['text'] = "Продуктът е изтрит успешно!";
    $_SESSION['flash']['message']['type'] = 'success';
}else {
    $_SESSION['flash']['message']['text'] = "Възникна грешка!";
    $_SESSION['flash']['message']['type'] = 'danger';
}

header("Location: ../index.php?page=products");
exit;
?>