<?php
require 'vendor/autoload.php';
require 'auth.php';

$auth0->logout();
$return_to = 'http://' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'food-portal.us.auth0.com', '20lRis7AgcQ7I4qfDwCyGQsZ1ulBwUxd', $return_to);
header('Location: ' . $logout_url);
die();
?>