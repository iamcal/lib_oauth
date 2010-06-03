<?
	include('../lib_oauth.php');


	$keys = array(
		'oauth_key'		=> 'GtAR0u9QLjNr',
		'oauth_secret'		=> '4M2PpvmhcMyfXybsacaed9CjKyoTQpMN',
		'request_key'		=> $_COOKIE[my_req_key],
		'request_secret'	=> $_COOKIE[my_req_secret],
	);


	##########################################################################################
	#
	# STEP 2 - exchange the authorized access token for a request token
	#

	$ok = oauth_get_access_token($keys, 'https://fireeagle.yahooapis.com/oauth/access_token');

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

	$ret = oauth_request($keys, "https://fireeagle.yahooapis.com/api/0.1/user");

	echo "Looks like it worked. We asked for location and we got:<hr />";

	echo "<pre>";
	echo HtmlSpecialChars($ret);
	echo "</pre>";

	echo "Refreshing this page <i>will fail</i>, since request tokens only work once. To test again, <a href=\"1_start.php\">start over</a>";
?>