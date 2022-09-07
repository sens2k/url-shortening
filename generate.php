<?php
session_start();
require_once 'dbConnection.php';
use Hashids\Hashids;
require 'vendor/autoload.php';

$url = $_POST['url'];

$sql = "SELECT * FROM urls WHERE url = '$url'";
$query = mysqli_query($connect, $sql);

if(mysqli_num_rows($query) == 0){
    $hashids = new Hashids($url, 0, 'abcdefghijklmnopqrstuvwxyz1234567890');
    $token = $hashids->encode(1, 2, 3);
    $query = "INSERT INTO urls (token, url) VALUES ('$token', '$url')";
    mysqli_query($connect, $query);
    $_SESSION['url'] = $url;
    $_SESSION['token'] = "ur.ls/".$token;
    header('Location: mainPage.php');
} else {
    $query = "SELECT token FROM urls WHERE url = '$url'";
    $token = mysqli_query($connect, $query);
    $token = mysqli_fetch_assoc($token);
    $_SESSION['url'] = $url;
    $_SESSION['token'] = "ur.ls/".$token['token'];
    header('Location: mainPage.php');
}
