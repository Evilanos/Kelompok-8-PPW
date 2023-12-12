<?php
    session_start();

    require_once "vendor/autoload.php";

    $access_token = $_SESSION["access_token"];

    //inisiasi ke google client
    $client = new Google_Client();
    $client->revokeToken($access_token);

    session_destroy();
    header("location: login.php");
?>