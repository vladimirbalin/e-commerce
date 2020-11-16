<?php

require_once '../config/config.php';
require_once '../config/db.php';
require_once '../library/mainFunctions.php';

session_start();
$_SESSION['cart'] = $_SESSION['cart'] ?? [];

$controllerName = $_GET['controller'] ?? 'Index';
$controllerName = ucfirst($controllerName);
$actionName = $_GET['action'] ?? 'index';

$smarty->assign('cartCountItems', count($_SESSION['cart']));

loadPage($controllerName, $actionName);
