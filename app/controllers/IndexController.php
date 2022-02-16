<?php

require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

function indexAction($smarty)
{
    $userArr = $_SESSION['user'] ?? [];
    $rsCategories = getMainCategoriesWithChildren();
    $rsProducts = getLastProducts(16);
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('userArr', $userArr);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}