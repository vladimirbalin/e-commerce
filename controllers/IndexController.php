<?php

require_once '../models/CategoriesModel.php';


function indexAction($smarty)
{
    $rsCategories = getMainCategories();
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'footer');
}