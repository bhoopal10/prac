<?php
require_once '../google-api/src/Google_Client.php';
require_once '../google-api/src/contrib/Google_DriveService.php';
include 'func.php';

$client = new Google_Client();
// Get your credentials from the console
$client->setClientId('861200055092-s6203rv7k4pts4qbveg59odprokbt82m.apps.googleusercontent.com');
$client->setClientSecret('nurGCJIyAmznFAff1GWF0kh4');
$client->setRedirectUri('http://localhost/prac/goapi/quickstart.php');
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
$service=new Google_DriveService($client);
if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['token']);
    die('Logged out.');
}

if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // auth call to google
    $authUrl = $client->createAuthUrl();
    header("Location: ".$authUrl);
    die;
}

$res=insertFile($service,'myfirst','nothing','0B2Fs2pO9JavEdGNyTVlkTzY4OVk','text/plain','../server.php');
//$res=createFolder($service,'myfolder','firstfolder');
print_r($res);
?>
