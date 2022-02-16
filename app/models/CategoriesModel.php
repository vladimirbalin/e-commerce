<?php

function getMainCategoriesWithChildren()
{
    $sql = 'SELECT * FROM categories
            WHERE parent_id=0';
    $rs = query($sql);

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
    return fetchAll(query($sql));
}

/**
 * Get the category data with id
 *
 * @param integer $catId ID категории
 * @return false|array - one line from category db
 */

function getCategoryById($catId)
{
    $sql = "SELECT * FROM categories
            WHERE id='{$catId}'";
    return fetchAll(query($sql));
}