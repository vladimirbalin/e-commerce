<?php

/**
 * New user registration
 *
 * @param string $email
 * @param string $pwdHash hashed password
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return array new user data array
 */

function registerNewUser($email, $pwdHash, $name, $phone, $address)
{
    $email = filterInputData($email);
    $name = filterInputData($name);
    $phone = filterInputData($phone);
    $address = filterInputData($address);

    $sql = "INSERT INTO users (email, pwd, name, phone, address)
            VALUES (:email, :pwd, :name, :phone, :address)";

    $rs = sqlInsertWithPrepare($sql, [
        'email' => $email,
        'pwd' => $pwdHash,
        'name' => $name,
        'phone' => $phone,
        'address' => $address
    ]);
    if ($rs) {
        $sql = "SELECT * FROM users 
                WHERE (email='{$email}' AND pwd='{$pwdHash}')
                LIMIT 1";
        $rs = sqlToArray($sql);
        $rs['success'] = isset($rs[0]) ? 1 : 0;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function checkForErrors($email, $pwd1, $pwd2)
{
    $res = [];
    if (!$email) {
        $res['success'] = 0;
        $res['errors'][] = 'Введите email';
    }
    if (!$pwd1) {
        $res['success'] = 0;
        $res['errors'][] = 'Введите пароль';
    }
    if (!$pwd2) {
        $res['success'] = 0;
        $res['errors'][] = 'Повторите пароль';
    }
    if ($pwd1 && $pwd2 && strcmp($pwd1, $pwd2) !== 0) {
        $res['success'] = 0;
        $res['errors'][] = 'Введенные пароли не совпадают';
    }
    return $res;
}

/**
 * Проверка почты(существует ли уже в БД введенный пользователем email)
 * Checking email(exists or not email in db)
 *
 * @param string $email
 * @return array|false array - string from users table, or false
 */

function checkEmailForRepeat($email)
{
    $sql = "SELECT id FROM users
            WHERE email='{$email}'";
    return sqlToArray($sql);
}

/**
 * Login in user
 * @param $email
 * @param $pwd
 * @return array user's data
 */
function loginUser($email, $pwd)
{
    $email = filterInputData($email);

    $sql = "SELECT * FROM users
            WHERE (email='{$email}')
            LIMIT 1";

    $rs = sqlToArray($sql);

    $checkPwd = password_verify($pwd, $rs[0]['pwd']);
    $rs['success'] = $checkPwd ? 1 : 0;

    return $rs;
}

/**
 * Updating user's data
 * @param $name
 * @param $phone
 * @param $address
 * @param $pwd1
 * @param $pwd2
 * @param $curPwd
 * @return boolean true if success
 */

function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd)
{
    $email = filterInputData($_SESSION['user']['email']);
    $name = filterInputData($name);
    $phone = filterInputData($phone);
    $address = filterInputData($address);

    if (!password_verify($curPwd, $_SESSION['user']['pwd'])) {
        return false;
    }
    $curPwdHash = getPwd($email)[0]['pwd'];

    $newPwd = null;
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = password_hash($pwd1, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE users
            SET ";
    if ($newPwd) {
        $sql .= "pwd = '{$newPwd}', ";
    }
    $sql .= "name='{$name}',
            phone='{$phone}',
            address='{$address}'
                WHERE
            email='{$email}' AND pwd='{$curPwdHash}'
            ";
    return sqlAlterQuery($sql);
}

function getPwd($email)
{
    $sql = "SELECT pwd 
            FROM users
            WHERE email='{$email}'
            LIMIT 1";
    return sqlToArray($sql);
}

function getCurrentUserOrders()
{
    $userId = $_SESSION['user']['id'];
    return getOrdersWithProductsByUser($userId);
}