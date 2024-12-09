<?php
$students = [
    [
        'name' => 'Иван Иванов',
        'subject' => 'ИКН',
        'active' => true
    ],
    [
        'name' => 'Мария Димитрова',
        'subject' => 'МИО',
        'active' => false
    ],
    [
        'name' => 'Георги Стефанов',
        'subject' => 'Туризъм',
        'active' => false
    ],
    [
        'name' => 'Силвия Иванова',
        'subject' => 'ДТБ',
        'active' => true
    ],
];

?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Студент</th>
            <th>Специалност</th>
            <th>Статус</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($students as $student) {
            echo '
        <tr>
            <td>' . $student['name'] . '</td>
            <td>' . $student['subject'] . '</td>
           ' . ($student['active'] ? '<td style="background-color:green;">Активен</td>' : '<td style="background-color:red;">Неактивен</td>') . '

        ';
        }

        ?>
    </tbody>
</table>