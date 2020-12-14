<?php

function getLastProducts($limit = null)
{
    $sql = 'SELECT * FROM products
            ORDER BY id DESC';
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }
    return sqlToArray($sql);
}

function getProductsByCategory($catId)
{
    $sql = "SELECT * FROM products
            WHERE category_id='{$catId}'";
    return sqlToArray($sql);
}

function getProductById($productId)
{
    $sql = "SELECT * FROM products
            WHERE id='{$productId}'";
    return sqlToArray($sql)[0];
}

/**
 * Get the products list with id's array from db
 * @param array $itemIds
 * @return array|false products data array/false
 */
function getProductsFromArray($itemIds)
{
    $strIds = implode(", ", $itemIds);
    $sql = "SELECT * FROM products
            WHERE id in ($strIds)";
    return sqlToArray($sql);
}