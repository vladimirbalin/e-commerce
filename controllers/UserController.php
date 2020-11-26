<?php
/**
 * Контроллер функций пользователя
 */

require_once '../models/CategoriesModel.php';
require_once '../models/UsersModel.php';

/**
 * регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 *
 * @return string информация об операции (успех, массив с данными о пользователе)
 */
function registerAction()
{
    $dataFromForm = json_decode(file_get_contents('php://input'), true);
    $email = $dataFromForm['email'] ?? null;
    $email = trim($email);

    $pwd1 = $dataFromForm['pwd1'] ?? null;
    $pwd2 = $dataFromForm['pwd2'] ?? null;

    $phone = $dataFromForm['phone'] ?? null;
    $address = $dataFromForm['address'] ?? null;
    $name = $dataFromForm['name'] ?? null;
    $name = trim($name);

    $resData = checkForErrors($email, $pwd1, $pwd2);

    if(!$resData && checkEmailForRepeat($email)){
        $resData['success'] = false;
        $resData['message'] = "Пользователя с таким email('{$email}') уже зарегистрирован";
    }
    d($resData);
    if(!$resData){ // check having all fields
        $pwdHash = password_hash($pwd1, PASSWORD_DEFAULT);
        $userData = registerNewUser($email, $pwdHash, $name, $phone, $address);
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ?? $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $resData['userName'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    echo json_encode($resData);
}