<?
	include('../lib_oauth.php');
	include('config.php');


	$keys = array(
		'oauth_key'		=> OAUTH_CONSUMER_KEY,
		'oauth_secret'		=> OAUTH_CONSUMER_SECRET,
		'request_key'		=> $_COOKIE[my_req_key],
		'request_secret'	=> $_COOKIE[my_req_secret],
	);


	##########################################################################################
	#
	# STEP 2 - exchange the authorized access token for a request token
	#

	$params = array();
	# OAuth 1.0a servers will return an extra oauth_verifier argument
	if (isset($_GET[oauth_verifier])) $params[oauth_verifier] = $_GET[oauth_verifier];

	$ok = oauth_get_access_token($keys, OAUTH_ACCESS_URL, $params);

	if (!$ok){

		echo "Something didn't work!<hr />";
		dump_last_request();
		exit;
	}

	setcookie('my_acc_key',		$keys[user_key]);
	setcookie('my_acc_secret',	$keys[user_secret]);

	header('location: 3_fetch.php');
?>