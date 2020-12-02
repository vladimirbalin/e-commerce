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

/**
 * Залогинивание юзера
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
 * Обновляет данные пользователя
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
    return sqlExec($sql);
}

function getPwd($email)
{
    $sql = "SELECT pwd 
            FROM users
            WHERE email='{$email}'
            LIMIT 1";
    return sqlToArray($sql);
}