<?php
require_once '../config/config.php';


function loadPage($controllerName, $actionName = 'index')
{
    global $smarty;
    include_once PATH_PREFIX . $controllerName . PATH_POSTFIX;

    $function = $actionName . 'Action';
    $function($smarty);
}

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TEMPLATE_POSTFIX);
}

function d($obj = null, $die = 1)
{
    echo "Debug: <br/><pre>";
    print_r($obj);
    echo "</pre>";

    if ($die) die;
}

function sqlToArray($sql)
{
    if(!$sql) return false;
    global $pdo;
    $query = $pdo->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
