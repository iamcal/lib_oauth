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

	$test_url = 'http://www.example.com';


	#
	# we first fetch the current profile data
	#

	$ret1 = oauth_request($keys, 'http://api.twitter.com/1/account/verify_credentials.json');
	if (!strlen($ret1)) dump_last_request();

	$obj = json_decode($ret1, 1);
	$orig_url = $obj[url];

	echo "current URL: $orig_url<br />";


	#
	# next we update
	#

	$ret2 = oauth_request($keys, 'http://api.twitter.com/1/account/update_profile.json', array(
		'url' => $test_url,
	), 'POST');
	if (!strlen($ret2)) dump_last_request();

	$obj = json_decode($ret2, 1);
	$new_url = $obj[url];

	echo "changed to $new_url<br />";


	#
	# now update again
	#

	$ret3 = oauth_request($keys, 'http://api.twitter.com/1/account/update_profile.json', array(
		'url' => $orig_url,
	), 'POST');
	if (!strlen($ret3)) dump_last_request();

	$obj = json_decode($ret3, 1);
	$final_url = $obj[url];

	echo "changed back to $final_url<br />";

?>