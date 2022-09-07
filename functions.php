<?php
use Hashids\Hashids;
require 'vendor/autoload.php';

function getLongUrl($connect, $token)
{
    $long_url = mysqli_query($connect, "SELECT url FROM urls WHERE token = '$token'");
    if(mysqli_num_rows($long_url) == 0){
        http_response_code(404);
    } else{
        $long_url = mysqli_fetch_assoc($long_url)['url'];
        header("Location: $long_url");
    }
}

function createUrl($connect, $longUrl){
    $already = mysqli_query($connect, "SELECT * FROM urls WHERE url = '$longUrl'");
    if(mysqli_num_rows($already) == 0){
        $hashids = new Hashids($longUrl, 0, 'abcdefghijklmnopqrstuvwxyz1234567890');
        $token = $hashids->encode(1, 2, 3);
        $query = "INSERT INTO urls (token, url) VALUES ('$token', '$longUrl')";
        mysqli_query($connect, $query);
        http_response_code(201);
    } else {
        http_response_code(200);
    }
}