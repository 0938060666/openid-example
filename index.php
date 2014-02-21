<?php
include('./config.inc.php');
$store = new Auth_OpenID_FileStore(STORE_PATH);
$consumer = new Auth_OpenID_Consumer($store);
$auth_request = $consumer->begin(PIXNET_OPENID);
$sreg_req = Auth_OpenID_SRegRequest::build(array('email', 'nickname'));
$auth_request->addExtension($sreg_req);


if ($auth_request->shouldSendRedirect()) {
    $redirect_url = $auth_request->redirectURL(TRUSTED_ROOT, RETURN_TO);
    if (Auth_OpenID::isFailure($redirect_url)) {
	echo("Could not redirect to server: " . $redirect_url->message);
    } else {
	// Send redirect.
	echo $redirect_url;
    }
} else {
    $form_id = 'openid_message';
    $form_html = $auth_request->formMarkup(TRUSTED_ROOT, RETURN_TO, false, array('id' => $form_id));

    // Display an error if the form markup couldn't be generated;
    //     // otherwise, render the HTML.
    if (Auth_OpenID::isFailure($form_html)) {
	displayError("Could not redirect to server: " . $form_html->message);
    } else {
	echo $form_html;
    }
}

