<?
	include('../lib_oauth.php');
	include('config.php');


	$keys = array(
		'oauth_key'		=> OAUTH_CONSUMER_KEY,
		'oauth_secret'		=> OAUTH_CONSUMER_SECRET,
		'user_key'		=> $_COOKIE[my_acc_key],
		'user_secret'		=> $_COOKIE[my_acc_secret],
	);


	##########################################################################################
	#
	# STEP 4 - perform authenticated POSTs
	#


	#
	# we first fetch the current profile data
	#

	$ret = oauth_request($keys, 'http://api.twitter.com/1/account/verify_credentials.json');
	if (!strlen($ret)) dump_last_request();

	$obj = json_decode($ret, 1);
	$url = $obj[url];

	echo "current URL: $url<br />";


	#
	# next we update
	#

	$ret2 = oauth_request($keys, 'http://api.twitter.com/1/account/update_profile.xml', array(
		'url' => 'test.url',
	), 'POST');
	if (!strlen($ret2)) dump_last_request();

	echo "<pre>".htmlspecialchars(var_export($GLOBALS[oauth_last_request],1))."</pre>";


	echo "<pre style=\"background-color: #f5f5f5\">".HtmlSpecialChars(var_export($ret2,1))."</pre>";
?>