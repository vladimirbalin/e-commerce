<?php

require_once '../config/config.php';
require_once '../library/mainFunctions.php';

$controllerName = $_GET['controller'] ?? 'Index';
$controllerName = ucfirst($controllerName);
$actionName = $_GET['action'] ?? 'index';


loadPage($smarty, $controllerName, $actionName);