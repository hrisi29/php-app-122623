<?php

?>

<!-- форма за добавяне на студент -->
<form class="border rounded p-4 w-50 mx-auto" method="POST" action="./handlers/handle_create.php">
    <div class="mb-3">
        <label for="names" class="form-label">Имена</label>
        <input type="text" class="form-control" id="names" name="names">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Имейл</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="major" class="form-label">Специалност</label>
        <input type="text" class="form-control" id="major" name="major">
    </div>
    <div class="mb-3">
        <label for="course" class="form-label">Курс</label>
        <input type="number" class="form-control" id="course" name="course">
    </div>
    <div class="mb-3">
        <label for="grade" class="form-label">Успех</label>
        <input type="number" step="0.01" class="form-control" id="grade" name="grade">
    </div>
    <button type="submit" class="btn btn-success">Добави</button>
</form>
