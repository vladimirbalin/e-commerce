<?php

function getMainCategoriesWithChildren()
{
    global $pdo;
    $sql = 'SELECT * FROM categories
            WHERE parent_id=0';
    $rs = $pdo->query($sql);

    $rsCategories = [];
    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
        $row['children'] = getChildrenOfCategories($row['id']);
        $rsCategories[] = $row;
    };
    return $rsCategories;
}

function getChildrenOfCategories($catId)
{
    $sql = "SELECT * FROM categories
            WHERE parent_id='{$catId}'";
    return sqlToArray($sql);
}

/**
 * Get the category data with id
 *
 * @param integer $catId ID категории
 * @return array - one line from category db
 */

function getCategoryById($catId)
{
    $sql = "SELECT * FROM categories
            WHERE id='{$catId}'";
    return sqlToArray($sql);
}