<?
	include('../lib_oauth.php');
	include('config.php');

	##########################################################################################
	#
	# STEP 1 - get an access token and a URL at which the user can auth it
	#

	$keys = array(
		'oauth_key'		=> OAUTH_CONSUMER_KEY,
		'oauth_secret'		=> OAUTH_CONSUMER_SECRET,
	);

	$ok = oauth_get_auth_token($keys, OAUTH_REQUEST_URL, array( 'oauth_callback' => OAUTH_CALLBACK_URL ));

	if ($ok){

		$url = oauth_get_auth_url($keys, OAUTH_AUTHORIZE_URL);

		setcookie('my_req_key',		$keys[request_key]);
		setcookie('my_req_secret',	$keys[request_secret]);

		echo "access url is <a href=\"$url\">$url</a>\n";
		exit;
	}else{
		dump_last_request();
	}
?>