<?php
require_once 'User.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("Content-Type: application/json; charset=UTF-8");
    
    if (isset($_GET['id'])) {
        echo json_encode(User::$users[$_GET['id']-1]);
    } else {
        echo json_encode(User::$users);//[{}, {}]
    }
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Content-Type: multipart/form-data;; charset=UTF-8");
    
    $user = array("id" => $_POST['id'], 
                        "nom" => $_POST['nom'], 
                        "prenom" => $_POST['prenom'], 
                        "email"=>$_POST['email'],
                        "password" => $_POST['password']
                    ); 
    User::$users[] = $user;
    echo json_encode(User::$users);//[{}, {}]
}
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    header("Content-Type: multipart/form-data;; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    parse_str(file_get_contents('php://input'), $_PUT);
    $user = array("id" => $_PUT['id'], 
                    "nom" => $_PUT['nom'], 
                    "prenom" => $_PUT['prenom'], 
                    "email"=>$_PUT['email'],
                    "password" => $_PUT['password']
                ); 
    User::$users[$_POST['id']]['id'] = $user['id'];
    User::$users[$_POST['id']]['nom'] = $user['nom'];
    User::$users[$_POST['id']]['prenom'] = $user['prenom'];
    User::$users[$_POST['id']]['email'] = $user['email'];
    User::$users[$_POST['id']]['password'] = $user['password'];

    echo json_encode(User::$users);//[{}, {}]
}
    
?>