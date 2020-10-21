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