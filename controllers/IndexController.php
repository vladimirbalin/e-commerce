<?php

function testAction()
{
    echo "IndexController.php > testAction";
}

function indexAction($smarty)
{
    $smarty->assign('pageTitle', 'Главная страница сайта');

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'footer');
}