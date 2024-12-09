<?php
$positions = [
    [
        'name' => 'CEO',
    ],
    [
        'name' => 'CTO',
        'email' => 'cto@company.com'
    ],
    [
        'name' => 'Manager',
        'email' => 'management@company.com',
    ],
    [
        'name' => 'Customer service',
        'email' => 'info@company.com',
    ],
    [
        'name' => 'Inspector',
        'email' => '',
    ],
];
?>

<html>

<body>
    <ul>
        <?php
        foreach ($positions as $position) {

            $email_link = ' ';
            if (isset($position['email']) && mb_strlen(($position['email'])) > 0) {
                $email_link = '<a href="mailto:' . $position['email'] . '">' . $position['email'] . '</a>';
            } else {
                $email_link = 'Няма предоставен имейл';
            }
            echo '
            <li>' . $position['name'] . ' - ' . $email_link . '</li>';
        }
        ?>
    </ul>
</body>

</html>