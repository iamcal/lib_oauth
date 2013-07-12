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
	# STEP 3 - access the protected resource
	#

	$ret = oauth_request($keys, OAUTH_PROTECTED_URL);
	if (!strlen($ret)) dump_last_request();

?>

<p>Looks like it worked. We asked for your latest tweet and we got:</p>

<div style="height: 200px; width: 600px; border: 1px solid #666; overflow: auto;">
<pre><?=HtmlSpecialChars($ret)?></pre>
</div>


<p>Refreshing this page will re-request these protected resources.</p>
<p>To test authenticated HTTP POSTs, <a href="4_post.php">click here</a> (requires cURL and JSON extensions to test).</p>
<p>To test again, <a href="1_start.php">start over</a></p>
