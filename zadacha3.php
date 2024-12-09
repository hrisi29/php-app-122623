<?php

// Да се добавят нужните HTML атрибути на формата, за да изпраща заявка към същия файл с метод GET.
// Чрез формата да се изпратят данни за име и възраст като GET параметри.
// Ако изпратените данни са празни или невалидни, да се изведе съобщение за грешка.
// Ако данните са валидни, да се изведат името, годините и информация дали лицето е пълнолетно.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Age Check</title>
</head>
<body>
    <div class="w-50 mx-auto">
        <?php
            if (isset($_GET["submit"])) {
                $name = $_GET["name"] ?? "";
                $age = $_GET["age"] ?? "";
                if (empty($name) || empty($age) || !is_numeric($age)) {
                    echo "<div class='alert alert-danger text-center mt-3'>Моля, въведете валидни данни!</div>";
                } else {
                    echo "<div class='alert alert-success text-center mt-3'>Име: $name, Възраст: $age, Пълнолетен: " . ($age >= 18 ? "Да" : "Не") . "</div>";
                }
            }
        ?>
    </div>
    <form class="w-50 mx-auto mt-5 border rounded p-4" method="GET">
        <div class="mb-3">
            <label for="name" class="form-label">Име</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Възраст</label>
            <input type="text" class="form-control" id="age" name="age">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Провери</button>
    </form>
</body>
</html>