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

		echo "<pre>";
		echo HtmlSpecialChars(print_r($keys, 1));
		echo "</pre>";
		exit;
	}


	##########################################################################################
	#
	# STEP 3 - access the protected resource
	#

	$ret = oauth_request($keys, OAUTH_PROTECTED_URL);

	echo "Looks like it worked. We asked for your latest tweet and we got:<hr />";

	echo "<pre>";
	echo HtmlSpecialChars($ret);
	echo "</pre>";

	echo "Refreshing this page <i>will fail</i>, since request tokens only work once. To test again, <a href=\"1_start.php\">start over</a>";
?>