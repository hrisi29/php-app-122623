<?php
require_once '../db.php';

$id = intval($_POST['id'] ?? 0);

if ($id <= 0) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Невалиден идентификатор';
    header('Location: ../index.php?page=read');
    exit;
}

$query = "DELETE FROM students WHERE id = :id";
$stmt = $pdo->prepare($query);
if ($stmt->execute([':id' => $id])) {
    $_SESSION['flash_msg']['type'] = 'success';
    $_SESSION['flash_msg']['text'] = 'Студентът е изтрит успешно';
} else {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Възникна грешка';
}
header('Location: ../index.php?page=read');
exit;
?>