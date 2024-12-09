<?php
require_once 'db.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    $_SESSION['flash_msg']['type'] = 'danger';
    $_SESSION['flash_msg']['text'] = 'Невалиден идентификатор';
    header('Location: ../index.php?page=read');
    exit;
}

$query = "SELECT * FROM students WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);
$student = $stmt->fetch();

?>

<!-- форма за редактиране на студент -->
<form class="border rounded p-4 w-50 mx-auto" method="POST" action="./handlers/handle_update.php">
    <div class="mb-3">
        <label for="names" class="form-label">Имена</label>
        <input type="text" class="form-control" id="names" name="names" value="<?php echo $student['name'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Имейл</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="major" class="form-label">Специалност</label>
        <input type="text" class="form-control" id="major" name="major" value="<?php echo $student['major'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="course" class="form-label">Курс</label>
        <input type="number" class="form-control" id="course" name="course" value="<?php echo $student['course'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="grade" class="form-label">Успех</label>
        <input type="number" step="0.01" class="form-control" id="grade" name="grade" value="<?php echo $student['grade'] ?? '' ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $student['id'] ?? 0 ?>">
    <button type="submit" class="btn btn-success">Редактирай</button>
</form>
