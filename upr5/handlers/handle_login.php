<?php

require_once('../functions.php');

$users = [
    [
        'email' => 'john@gmail.com',
        'password' => '123456',
        'name' => 'John Jones',
        'hash' => '$argon2i$v=19$m=65536,t=4,p=1$dnRnRUxFVW1qRTEuazlndw$PKIc/OMk8eaNHKPFbZhBamvULhDKmgNCzE0QzYvlAHw'
    ],
    [
        'email' => 'ana@gmail.com',
        'password' => 'qwerty',
        'name' => 'Ana Smith',
        'hash' => '$argon2i$v=19$m=65536,t=4,p=1$RHRoZTlBRmVZMGpHVUNPSQ$sV8mWMIb7QgRi3yxSxctOabqvc0FKdNm1ib4syN4nMU'
    ],
    [
        'email' => 'ivan@gmail.com',
        'password' => 'asd123',
        'name' => 'Ivan Ivanov',
        'hash' => '$argon2i$v=19$m=65536,t=4,p=1$eTdmbktaNWMvejZJWWNPRA$n2PgeYUUTh6aBThzIqBVm+xn+Wk03/dmeptlQpb72Cg'
    ],
];

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

foreach ($users as $user) {
    if ($user['email'] == $email && password_verify($password, $user['hash'])) {
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        setcookie('last_login', $user['email'], time() + 3600, '/', 'localhost', false, false);

        header('Location: ../index.php?page=home');
        exit;
    }
}


?>