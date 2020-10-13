<?php
require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
    'domain' => 'cave421.us.auth0.com',
    'client_id' => 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw',
    'client_secret' => '-0K2p4wvZJ7pNhZeM6cyHJXKEqoCvf5GIwccN_VPPzFyo6MlbH5Zq6uo52c22ZCn',
    'redirect_uri' => 'http://localhost:8080/',
    'scope' => 'openid profile email',
  ]);

$auth0->logout();
$return_to = 'https://' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'cave421.us.auth0.com', 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw', $return_to);
header('Location: ' . $logout_url);
die();
?>