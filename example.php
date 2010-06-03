<?
	include('lib_oauth.php');


	##########################################################################################
	#
	# STEP 1 - get an access token and a URL at which the user can auth it
	#

	$keys = array(
		'oauth_key'		=> 'my-oauth-consumer-key',
		'oauth_secret'		=> 'my-oauth-consumer-secret',
	);

	$ok = oauth_get_auth_token($keys, "http://example.com/request-token-url");

	if ($ok){

		$url = oauth_get_auth_url($keys, "http://example.com/authorize-url");

		echo "access url is $url\n";
		exit;
	}else{
		die("something went wrong");
	}

	# (this step adds two keys to the $keys hash)


	##########################################################################################
	#
	# STEP 2 - exchange the authorized access token for a request token
	#

	$ok = oauth_get_access_token($keys, 'http://example.com/access-token-url');

	if ($ok){

		echo "it worked!";
		exit;
	}else{
		die("it didn't work!");
	}
	
	# (this step adds two more keys to the $keys hash)


	##########################################################################################
	#
	# STEP 3 - access the protected resource
	#

	$ret = oauth_request($keys, "http://example.com/protected-resource");

	echo "HTTP response was $ret";
	exit;
?>