<?php
error_reporting(0);
@ob_start();
session_start();
$host = "mysql-server";
$user = "root";
$pass = "root";
$db = "food-portal";
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include("home.php");
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require __DIR__ . '/vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'cave421.us.auth0.com',
  'client_id' => 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw',
  'client_secret' => '-0K2p4wvZJ7pNhZeM6cyHJXKEqoCvf5GIwccN_VPPzFyo6MlbH5Zq6uo52c22ZCn',
  'redirect_uri' => 'http://localhost:8080/',
  'scope' => 'openid profile email',
]);

$userInfo = $auth0->getUser();

if (!$userInfo) {
    echo "No user";
    // We have no user info
    // See below for how to add a login link
} else {
    // User is authenticated
    // See below for how to display user information
    $userInfo = $auth0->getUser();
    $userEmail = $userInfo['email'];
    printf( 'Hello %s!Your email is %s!', htmlspecialchars( $userInfo['name'] ), $userEmail );
    
}?>

<?php if(!$userInfo): ?>
    <a href="login.php">Log In</a>
<?php else: ?>
  <a href="/logout.php">Logout</a>
<?php endif ?>
