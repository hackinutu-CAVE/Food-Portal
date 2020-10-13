<?php
// login.php

require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
    'domain' => 'cave421.us.auth0.com',
    'client_id' => 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw',
    'client_secret' => '-0K2p4wvZJ7pNhZeM6cyHJXKEqoCvf5GIwccN_VPPzFyo6MlbH5Zq6uo52c22ZCn',
    'redirect_uri' => 'https://a588cff11602.ngrok.io/',
    'scope' => 'openid profile email',
  ]);

$auth0->login();