<?php

require_once '../db.php';

$names = $_POST['names'] ?? '';
$email = $_POST['email'] ?? '';
$specialty = $_POST['specialty'] ?? '';
$course = intval($_POST['course'] ?? 0);
$grade = floatval($_POST['grade'] ?? 0);


if (mb_strlen($names) < 6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Името на студента трябва да бъде поне 6 символа.';
    header('Location: ../index.php?page=create');
    exit;
}

if (mb_strlen($email) < 5) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Имейла на студента трябва да бъде поне 5 символа.';
    header('Location: ../index.php?page=create');
    exit;
}
if ($course <1||$course>6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Курсът на студента трябва да бъде между 1 и 6.';
    header('Location: ../index.php?page=create');
    exit;
}
if ($grade <2||$grade>6) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Успехът на студента трябва да бъде между 2 и 6.';
    header('Location: ../index.php?page=create');
    exit;
}

$query = "INSERT INTO students (names, email, specialty, course, grade) VALUES (:names, :email, :specialty, :course, :grade)";
$stmt = $pdo->prepare($query);
$params = [
    ':names' => $names,
    ':email' => $email,
    ':specialty' => $specialty,
    ':course' => $course,
    ':grade' => $grade
];
if ($stmt->execute($params)) {
    $_SESSION['flash_msg']['type'] = 'grade';
    $_SESSION['flash_msg']['text'] = 'Студента е добавен успешно.';
    header('Location: ../index.php?page=read');
    exit;
} else {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Възникна грешка.';
    header('Location: ../index.php?page=create');
    exit;
}



?>