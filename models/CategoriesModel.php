<?php
require '../config/db.php';
function getMainCategories()
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
            WHERE parent_id=$catId";
    return sqlToArray($sql);
}