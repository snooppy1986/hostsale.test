<?php
namespace App\Validate;

use App\Logs\Log;

class Validation
{
    public static function validate($data)
    {
        $errors = [];
        /*checking email*/
        if($data['email'] && !str_contains($data['email'], '@')){
            $errors['email']= 'Помилка. Поштова адреса має містити "@"';
        }
        /*checking password*/
        if(!$data['password']){
            $errors['password']= 'Введіть пароль';
        }
        /*checking password_confirmation*/
        if($data['password'] && !$data['password_confirmation']){
            $errors['password_confirmation']= 'Підтвердіть пароль';
        }
        /*checking password = password_confirmation*/
        if($data['password'] && $data['password_confirmation'] && $data['password'] !== $data['password_confirmation']){
            $errors['password']= 'Помилка підтвердження';
            $errors['password_confirmation']= 'Помилка підтвердження';
        }

        return $errors;
    }

    public static function unique_email($users_array, $email)
    {
        /*init log class*/
        $log = Log::setPathByMethod(__METHOD__);
        foreach ($users_array as $user) {
            if($user['email'] === $email){
                /*write to log*/
                $log->log("Користувач з email $email вже існує.");
                return false;
            }
        }
        /*write to log*/
        $log->log("Дані користувача з email $email записані успішно.");
        return true;
    }
}