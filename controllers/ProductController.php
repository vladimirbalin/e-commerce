<?php

/**
 * Контроллер страницы товара (/product/1)
 */

require_once '../models/ProductsModel.php';
require_once '../models/CategoriesModel.php';

/**
 * Формирование страницы продукта
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty)
{

    $productId = (int)$_GET['id'] ?? null;
    if (!$productId) exit();

    $rsProduct = getProductById($productId);
    $rsCategories = getMainCategoriesWithChildren();

    $smarty->assign('itemInCart', 0);
    if(in_array($productId, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }
    $smarty->assign('pageTitle', 'Страница товара');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    $smarty->assign('rsProductDescription', str_replace("\\n", "<br>", $rsProduct['description']));

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}