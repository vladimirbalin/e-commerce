<?php

$dbLocation = '127.0.0.1';
$dbName = "myshop";
$dbUserName = "postgres";
$dbPassword = "";

$pdo = new PDO("pgsql:host=$dbLocation;dbname=$dbName", $dbUserName, $dbPassword);

if(!$pdo){
    echo "Ошибка доступа к DB";
    exit();
}
