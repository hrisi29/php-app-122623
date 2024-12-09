<?php
$student = [
    'name' => 'Християна Калчева',
    'discipline' => 'Сървърно програмиране',
    'grade' => 5.5381
];

$grade_rounded=round($student['grade'],2);

echo 'Студентът ' . $student['name'] . ' има оценка '. $grade_rounded . ' по дисциплината '. $student['discipline'];

?>