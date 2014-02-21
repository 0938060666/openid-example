<?php
include('./config.inc.php');
echo '<pre>';
print_r($_GET);
echo '</pre>';

$store = new Auth_OpenID_FileStore(STORE_PATH);
$consumer = new Auth_OpenID_Consumer($store);
$response = $consumer->complete(RETURN_TO);
$openid = $response->getDisplayIdentifier();
$sreg_resp = Auth_OpenID_SRegResponse::fromSuccessResponse($response);
echo "OpenID: " . $openid . "<br>";
print_r($sreg_resp->contents());
?>
<hr>
<a href="index.php">Login</a>
