// logout.php

// ...
$auth0->logout();
$return_to = 'http://' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'YOUR_DOMAIN', 'YOUR_CLIENT_ID', $return_to);
header('Location: ' . $logout_url);
die();