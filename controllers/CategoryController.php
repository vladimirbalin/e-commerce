<?php

/**
 * Контроллер страницы категории (category/1)
 */

require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';

function indexAction($smarty)
{
    $catId = (int)$_GET['id'] ?? null;
    if (!$catId) exit();

    $rsCategory = getCategoryById($catId);
    $rsChildCategories = null;
    $rsProducts = null;

    if ($rsCategory[0]['parent_id'] == 0) {
        $rsChildCategories = getChildrenOfCategories($catId);
    } else {
        $rsProducts = getProductsByCategory($catId);
    }

    $rsCategories = getMainCategories();
    $smarty->assign('pageTitle', 'Товары категории ' . $rsCategory[0]['name']);
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCategories', $rsChildCategories);

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}