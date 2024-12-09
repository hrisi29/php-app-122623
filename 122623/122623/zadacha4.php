<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Complaint</title>
</head>
<body>
    <br>
    <div class="w-50 mx-auto">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['complaint'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['complaint'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $complaint = htmlspecialchars(trim($_POST['complaint']));

    if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($complaint) < 30) {
        echo '<div class="alert alert-danger text-center">Моля, въведете валидни данни.</div>';
    } else {
        echo '<div class="alert alert-success text-center">Успешно изпратено оплакване! </div>';
    }
}}
?>
</div>
<form class="w-50 mx-auto mt-5 border rounded p-4" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Име</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Имейл</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="complaint" class="form-label">Оплакване</label>
            <textarea class="form-control" id="complaint" name="complaint"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Изпрати</button>
    </form>
</body>
</html>