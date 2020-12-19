<?php

/**
 * Cart page controller (/cart/)
 */

require_once '../models/CategoriesModel.php';
require_once '../models/ProductsModel.php';
require_once '../models/PurchaseModel.php';
require_once '../models/OrdersModel.php';

/**
 * Adding products to a cart
 * @param integer id GET variable - ID of adding product
 * @return string|false json (array of count of elements in a cart, success status, cart)
 */
function addToCartAction()
{
    $itemId = intval($_GET['id']) ?? null;
    if (!$itemId) return false;

    $resData = [];
    if (isset($_SESSION['cart']) && !in_array($itemId, $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $itemId);
        $resData = [
            'countItems' => count($_SESSION['cart']),
            'success' => 1,
            'cart' => $_SESSION['cart']];
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

/**
 * Removing products from cart
 * @param integer id of GET variable - ID of removing product
 * @return string|false json (success, count of elements in a cart)
 */
function removeFromCartAction()
{
    $itemId = (int)$_GET['id'] ?? null;
    if (!$itemId) return false;

    $resData = [];
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData = [
            'countItems' => count($_SESSION['cart']),
            'success' => 1,
        ];
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

/**
 * Rendering a cart page /cart/
 * @param object $smarty template engine
 */
function indexAction($smarty)
{
    $itemsIds = $_SESSION['cart'] ?? [];

    $rsCategories = getMainCategoriesWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

/**
 * Rendering an order page
 * @param object $smarty template engine
 *
 * @return bool false if failed
 */
function orderAction($smarty)
{
    $phonesIds = $_SESSION['cart'] ?? null;
    if (!$phonesIds) {
        redirect('/cart/');
        return false;
    }

    // getting from $_POST count of buying items $id => $countOfPhones
    $phonesToBuy = [];
    foreach ($phonesIds as $id) {
        $postVar = 'itemCnt_' . $id;
        $phonesToBuy[$id] = $_POST[$postVar] ?? null;
    }

    $rsProducts = getProductsFromArray(array_keys($phonesToBuy));

    if(!$rsProducts){
        echo 'Корзина пуста';
        return false;
    }

    foreach ($rsProducts as $key => &$phone) {
        $phone['count'] = $phonesToBuy[$phone['id']] ?? 0;
        if ($phone['count']) {
            $phone['finalPrice'] = $phone['count'] * $phone['price'];
        } else {
            unset($rsProducts[$key]);
        }
    }

    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getMainCategoriesWithChildren();
    if(!isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox', 1);
    }

    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

/**
 * AJAX function saving order
 * @return string json information of results
 **/
function saveOrderAction()
{
    $cart = $_SESSION['saleCart'] ?? null;
    if(!$cart){
        $resData['success'] = 0;
        $resData['message'] = 'Нет товаров для заказа';
        echo json_encode($resData);
        return;
    }

    $dataFromHttpRequest = json_decode(file_get_contents('php://input'), true);
    $name = $dataFromHttpRequest['name'] ?? null;
    $phone = $dataFromHttpRequest['phone'] ?? null;
    $address = $dataFromHttpRequest['address'] ?? null;

    $orderId = createNewOrder($name, $phone, $address);
    if(!$orderId){
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создания заказа';
        echo json_encode($resData);
        return;
    }
    $res = purchaseNewOrder($orderId, $cart);
    if($res){
        $resData['success'] = 1;
        $resData['message'] = 'Заказ успешно выполнен';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесения данных для заказа № ' . $orderId;
    }
    echo json_encode($resData);
}