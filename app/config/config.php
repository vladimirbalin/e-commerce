<?php

// константы для обращения к контроллерам
define('PATH_PREFIX', '../controllers/');
define('PATH_POSTFIX', 'Controller.php');

// используемый шаблон
$template = 'default';

// пути к файлам шаблонов
define('TEMPLATE_PREFIX', "../views/{$template}");
define('TEMPLATE_POSTFIX', '.tpl');

// пути к файлам шаблонов в вебпространстве
define('TEMPLATE_WEB_PATH', "/www/templates/{$template}");

require_once '../library/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->setTemplateDir(TEMPLATE_PREFIX);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/lexer');

$smarty->assign('templateWebPath', TEMPLATE_WEB_PATH);