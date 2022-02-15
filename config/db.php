<?php

$dbLocation = '127.0.0.1';
$dbName = "myshop";
$dbUserName = "root";
$dbPassword = "root";

$pdo = new PDO("mysql:host=$dbLocation;dbname=$dbName", $dbUserName, $dbPassword);

if(!$pdo){
    echo "Ошибка доступа к DB";
    exit();
}