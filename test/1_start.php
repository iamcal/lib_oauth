<?
	include('../lib_oauth.php');


	##########################################################################################
	#
	# STEP 1 - get an access token and a URL at which the user can auth it
	#

	$keys = array(
		'oauth_key'		=> 'GtAR0u9QLjNr',
		'oauth_secret'		=> '4M2PpvmhcMyfXybsacaed9CjKyoTQpMN',
	);

	$ok = oauth_get_auth_token($keys, "https://fireeagle.yahooapis.com/oauth/request_token");

	if ($ok){

		$url = oauth_get_auth_url($keys, "https://fireeagle.yahoo.net/oauth/authorize");

		setcookie('my_req_key',		$keys[request_key]);
		setcookie('my_req_secret',	$keys[request_secret]);

		echo "access url is <a href=\"$url\">$url</a>\n";
		exit;
	}else{
		die("something went wrong");
	}
?>