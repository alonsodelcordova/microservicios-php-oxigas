<?php
$HOST = $_ENV['DB_HOST'];
$USER = $_ENV['DB_USER'];
$PASS = $_ENV['DB_PASSWORD'];
$DB = $_ENV['DB_NAME'];

return [
    'host' => $HOST,
    'user' => $USER,
    'password' => $PASS,
    'database' => $DB,
    'charset' => 'utf8mb4',
];


