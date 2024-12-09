<?php

require_once '../db.php';

$id = intval($_POST['id'] ?? 0);
$names = $_POST['names'] ?? '';
$email = $_POST['email'] ?? '';
$specialty = $_POST['specialty'] ?? '';
$course = intval($_POST['course'] ?? 0);
$grade = floatval($_POST['grade'] ?? 0);

if ($id <= 0) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Невалиден идентификатор';
    header('Location: ../index.php?page=read');
    exit;
}
if (mb_strlen($names) < 6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Името на студента трябва да бъде поне 6 символа.';
    header('Location: ../index.php?page=update&id=' . $id);
    exit;
}

if (mb_strlen($email) < 5) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Имейла на студента трябва да бъде поне 5 символа.';
  header('Location: ../index.php?page=update&id=' . $id);    
  exit;
}
if ($course <1||$course>6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Курсът на студента трябва да бъде между 1 и 6.';
  header('Location: ../index.php?page=update&id=' . $id);    
  exit;
}
if ($grade <2||$grade>6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Успехът на студента трябва да бъде между 2 и 6.';
    header('Location: ../index.php?page=update&id=' . $id);    
    exit;
}

// обновяваме данните в базата
$query = "UPDATE students SET names = :names, email = :email, specialty = :specialty, course = :course, grade=:grade WHERE id = :id";
$stmt = $pdo->prepare($query);
$params = [
    ':id' => $id,
    ':names' => $names,
    ':email' => $email,
    ':specialty' => $specialty,
    ':course' => $course,
    ':grade' => $grade
];
if ($stmt->execute($params)) {
    $_SESSION['flash_msg']['type'] = 'success';
    $_SESSION['flash_msg']['text'] = 'Студентът е обновен успешно';
} else {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Възникна грешка';
}
header('Location: ../index.php?page=update&id=' . $id);
exit;

?>