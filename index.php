<?php
require_once 'dbConnection.php';
require_once 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];
$token = $_GET['q'];

switch ($method){
    case 'POST':
        if(!isset($token)) createUrl($connect, $_POST['url']);
        break;
    case 'GET':
        if(isset($token)) getLongUrl($connect, $token);
        if(!isset($token)) include 'mainPage.php';
        break;
}


