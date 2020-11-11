<?php
error_reporting(0);
@ob_start();
session_start();
require '/var/www/html/vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
    'domain' => 'food-portal.us.auth0.com',
    'client_id' => '20lRis7AgcQ7I4qfDwCyGQsZ1ulBwUxd',
    'client_secret' => 'PuJTEWyhhPEaHZWqnbaZyEwqqwKHHFbGpe6z9XxHH80loP6LUo8xn18yFn-KZtMR',
    'redirect_uri' => 'http://localhost:8080/',
    'scope' => 'openid profile email',
]);

$userInfo = $auth0->getUser();
?>