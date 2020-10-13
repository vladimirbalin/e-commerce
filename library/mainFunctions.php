<?php
require_once '../config/config.php';


function loadPage($smarty, $controllerName, $actionName = 'index')
{
    include_once PATH_PREFIX . $controllerName . PATH_POSTFIX;
    $function = $actionName . 'Action';
    $function($smarty);
}

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TEMPLATE_POSTFIX);
}