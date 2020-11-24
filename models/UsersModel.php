<?php

/**
 * Регистрация нового пользователя
 *
 * @param string $email почта
 * @param string $pwdHash пароль хэшированный
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return array массив данных нового пользователя
 */

function registerNewUser($email, $pwdHash, $name, $phone, $address)
{
    function filterInputData($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

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

/**
 * Проверка параметров для регистрации пользователя
 *
 * @param string $email
 * @param string $pwd1
 * @param string $pwd2 pass check
 * @return array результирующий массив
 */
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
 *
 * @param string $email
 * @return array|false массив - строка из таблицы users, либо false
 */
function checkEmailForRepeat($email)
{
    $sql = "SELECT id FROM users
            WHERE email='{$email}'";
    return sqlToArray($sql);
}