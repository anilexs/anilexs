<?php
session_start();
require_once "../model/database.php";
require_once "../model/userModel.php";
// require_once "../model/catalogModel.php";

const HTTP_OK = 200;
const HTTP_BAD_REQUEST = 400; 
const HTTP_METHOD_NOT_ALLOWED = 405; 

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST'){
    $response_code = HTTP_BAD_REQUEST;
    $message = "il manque le paramétre ACTION";

    if($_POST['action'] == "singIn"){
        $condition = $_POST['data']['password'] === $_POST['data']['password2'];
        $condition2 = $_POST['data']['pseudo'] != '' && $_POST['data']['email'] != '' && $_POST['data']['password'] != '' && $_POST['data']['password2'] != '';
        if($condition && $condition2){
            $inscription = User::inscription($_POST['data']['email'], $_POST['data']['pseudo'], $_POST['data']['password']);
        }else{
            $id = "non";
        }
        $responseTab = [
            "response_code" => HTTP_OK,
            "id" => $inscription
        ];
        $response_code = HTTP_OK;
        reponse($response_code, $responseTab);
    }else if($_POST['action'] == "deconnexion"){
        // User::deconnexion();
    }

}else {
    $response_code = HTTP_METHOD_NOT_ALLOWED;
    $responseTab = [
        "response_code" => HTTP_METHOD_NOT_ALLOWED,
        "message" => "method not allowed"
    ];
    
    reponse($response_code, $responseTab);
}

function reponse($response_code, $response){
    header('Content-Type: application/json');
    http_response_code($response_code);
    
    echo json_encode($response);
}