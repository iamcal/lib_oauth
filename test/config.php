<?
	#
	# you will want to edit at least the callback URL below to
	# get things running. it needs to point to your own copy
	# of 2_callback.php
	#

	define('OAUTH_CONSUMER_KEY',	'gDGTH8u2vMPLKgRYHi53WQ');
	define('OAUTH_CONSUMER_SECRET',	'GYbImo4hvCttwGsHC7BY9id01vzxxTOroVaTuP4vc');

	define('OAUTH_REQUEST_URL',	'https://api.twitter.com/oauth/request_token');
	define('OAUTH_ACCESS_URL',	'https://api.twitter.com/oauth/access_token');
	define('OAUTH_AUTHORIZE_URL',	'https://api.twitter.com/oauth/authorize');

	define('OAUTH_CALLBACK_URL',	'http://127.0.0.1/misc-projects/lib_oauth/test/2_callback.php');

	define('OAUTH_PROTECTED_URL',	'http://api.twitter.com/1/statuses/user_timeline.xml?count=1');
?>