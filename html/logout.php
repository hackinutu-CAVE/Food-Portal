<?php
require 'vendor/autoload.php';
require 'auth.php';

$auth0->logout();
$return_to = 'https://' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'cave421.us.auth0.com', 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw', $return_to);
header('Location: ' . $logout_url);
die();
?>