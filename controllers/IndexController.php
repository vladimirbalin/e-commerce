<?php

require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

function indexAction($smarty)
{
    $rsCategories = getMainCategories();
    $rsProducts = getLastProducts(16);
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}