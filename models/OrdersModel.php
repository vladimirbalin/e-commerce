<?php

function createNewOrder($name, $phone, $address)
{
    $userId = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userId}<br>
                Имя: {$name}<br>
                Тел: {$phone}<br>
                Адрес: {$address}<br>";
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO
            orders (user_id, date_created, date_payment, date_modification, status, comment, user_ip)
            VALUES (:user_id, :date_created, null, :date_modification, 'false', :comment, :user_ip)";
    $rs = sqlInsertWithPrepare($sql, [
        'user_id' => $userId,
        'date_created' => $dateCreated,
        'date_modification' => $dateCreated,
        'comment' => $comment,
        'user_ip' => $userIp
    ]);

    if ($rs) {
        $sql = "SELECT id 
                FROM orders
                ORDER BY id DESC
                LIMIT 1";
        $rs = sqlToArray($sql);
        if (isset($rs[0]['id'])) return $rs[0]['id'];
    }
    return false;
}

function getOrdersWithProductsByUser($userId)
{
    global $pdo;
    $userId = intval($userId);
    $sql = "SELECT * FROM orders
            WHERE user_id='{$userId}'
            ORDER BY id DESC";
    $rsOrders = sqlToArray($sql);
    foreach ($rsOrders as &$order) {
        $rsPurchaseProducts = getPurchaseByOrderId($order['id']);
        if ($rsPurchaseProducts) {
            $order['products'] = $rsPurchaseProducts;
        }
    }
    return $rsOrders;
}