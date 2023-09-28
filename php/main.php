<?php

require '../app/classes/Validate/Validation.php';
require '../app/classes/Logs/Log.php';

use App\Validate\Validation;
use App\Logs\Log;
/*set path to log folder*/
Log::setRootLogDir('../logs');
/*create users array*/
$users = [
    [
        'id' => 1,
        'name' => 'Віктор',
        'email' => 'viktor@gmail.com',
        'password' =>'11111111'
    ],
    [
        'id' => 2,
        'name' => 'Артем',
        'email' => 'artem@gmail.com',
        'password' =>'2222222'
    ],
    [
        'id' => 3,
        'name' => 'Маргарита',
        'email' => 'margo@gmail.com',
        'password' =>'33333333'
    ],
    [
        'id' => 4,
        'name' => 'Анна',
        'email' => 'anna@gmail.com',
        'password' =>'44444444'
    ]
];
/*get data from request*/
$data = $_POST['data'];
/*validate request data*/
$validate_error = Validation::validate($data);
/*if not validation errors*/
if(!$validate_error){
    /*validate unique email address*/
    if(Validation::unique_email($users, $data['email'])){
        /*add to data id*/
        $data['id'] = count($users)+1;
        /*add data to users array*/
        array_push($users, $data);
        echo json_encode([
            'users' => $users,
            'message'=>'Дані користувача '.$data['name'].' додані успішно.',
            'status'=>true
        ]);
    }else{
        echo json_encode([
            'message'=>'Поштова адреса зайнята. Спробуйте іншу.',
            'status'=>false
        ]);
    }
}else{
   echo json_encode([
       'message'=>'Помилка реєстрації.',
       'errors'=> $validate_error,
       'status'=>false
   ]);
}


