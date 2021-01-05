<?php
/**
 * Putting data of products to the db with binding to order
 * @param integer $orderId
 * @param array $cart
 * @return boolean true if succeeded
 */
function purchaseNewOrder($orderId, $cart)
{
    $sql = "INSERT INTO purchase
            (order_id, product_id, price, amount)
            VALUES ";
    $values = [];
    foreach ($cart as $product){
        $values[] = "($orderId, $product[id], $product[price], $product[count])";
    }
    $sql .= implode(', ', $values);

    return sqlAlterQuery($sql);
}

function getPurchaseByOrderId($orderId)
{
    $sql = "SELECT purchase.*,products.name 
            FROM purchase
            JOIN products ON products.id=purchase.product_id
            WHERE purchase.order_id='{$orderId}'";
    return sqlToArray($sql);
}