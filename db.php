<?php

require "lib/rb-postgres.php";
R::setup(
    'pgsql:host=localhost;dbname=user_test_db',
    'user_test',
    '123qwe'
);
if (!R::testConnection()) {
    exit('Нет соединения с базой данных');
}


// $dsn = "pgsql:host=localhost;port=5432;dbname=user_test_db;user=user_test;password=123qwe";
// $db  = "user_test_db";
// try {
//     $conn = new PDO($dsn);
//     if ($conn) {
//         //echo "Connected to the <strong>$db</strong> database successfully!";
//     }
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }

