<?php
$td_php_v = '1.0.9';
$trackdrive_number_data = array();
$trackdrive_tokens = trackdrive_get_default_tokens();
$trackdrive_debug = array();
$trackdrive_error;

$trackdrive_config = array(
	'numbers_url' => 'https://api.trackdrive.net/api/v1/numbers/',
 	'leads_url' => 'https://api.trackdrive.net/api/v1/leads/',
 	'fallback_numbers_url' => 'https://api.trackdrive.net/api/v1/numbers/'
);

function show_trackdrive_number($offer_key, $options=array(), $optional_tokens=array())	
{
	echo get_trackdrive_number($offer_key, $options, $optional_tokens);
}

function show_trackdrive_extension($offer_key, $options=array(), $optional_tokens=array())	
{
	echo get_trackdrive_extension($offer_key, $options, $optional_tokens);
}

function get_trackdrive_extension($offer_key, $options=array(), $optional_tokens=array())
{
	global $trackdrive_error;
	// attempt to use a cached extension from the url query params
	if (array_key_exists('tfne', $_GET)){
		return $_GET['tfne'];
	} else {

		try {
			$data = request_trackdrive_number($offer_key, $options, $optional_tokens);
			$output = $data['number']['extension'];

		} catch(Exception $e) {
			$trackdrive_error = $e;
		}

		if (empty($output)){
			$output = get_default_extension($options);
		}

		return $output;

	}
}

function get_trackdrive_number($offer_key, $options=array(), $optional_tokens=array())
{
	global $trackdrive_error;
	// process format
	if (array_key_exists('format', $options)){
		$format = $options['format'];
	} else {
		$format = 'human';
	}
	// attempt to use a number from the url
	$cached_number = get_cached_trackdrive_number($format);
	// attempt to use a cached number from the url query params
	if (!empty($cached_number)){
		return $cached_number;
	} else {
		// request a new number from the api
		try {
			$method_name = $format . "_number";
			$data = request_trackdrive_number($offer_key, $options, $optional_tokens);

			if (array_key_exists('number', $data)){
				$output = $data['number'][$method_name];
			} else {
				$output = $data;
			}
			
		} catch(Exception $e) {
			$trackdrive_error = $e;
		}

		if (empty($output) || (is_array($output) && array_key_exists('no_tracking', $output))){
			$output = get_default_number($options);
		}

		return $output;
	}
}

function get_cached_trackdrive_number($format)
{
	foreach($_GET as $key => $value)
	{
	   	if ($format == 'human'){
	   		if ($key == 'ftfn' || preg_match('/0ftfn1/', $key)){
	   			return $value;
	   		}
	   	} else {
	   		if ($key == 'tfn' || preg_match('/0tfn1/', $key)){
	   			return $value;
	   		}
	   	}
	}
	return '';
}

function get_default_data($options)
{
	return array(
		'number' => array(
			'human_number' => get_default_number($options), 
			'plain_number' => get_default_number($options), 
			'extension' => get_default_extension($options),
			'checksum' => 'default',
			'id' => 'default'
		)
	);
}

function get_default_extension($options)
{
	if (array_key_exists('dne', $_GET)){
		return $_GET['dne'];
	} else if (array_key_exists('default_extension', $options)){
		return $options['default_extension'];
	}
}

function get_default_number($options)
{
	if (array_key_exists('format', $options)){
		$format = $options['format'];
	} else {
		$format = 'human';
	}

	$query_value = get_cached_default_number($format);

	if (!empty($query_value)){
		return $query_value;
	} else 	if (array_key_exists('default_number', $options)){
		return $options['default_number'];
	} else {
		return '[default-number]';
	}
}

function get_cached_default_number($format)
{
	foreach($_GET as $key => $value)
	{
	   	if ($format == 'human'){
	   		if ($key == 'dfn' || preg_match('/0dfn1/', $key)){
	   			return $value;
	   		}
	   	} else {
	   		if ($key == 'dn' || preg_match('/0dn1/', $key)){
	   			return $value;
	   		}
	   	}
	}
	return '';
}

function request_trackdrive_number($offer_key, $options=array(), $optional_tokens=array())
{
	global $trackdrive_number_data;
	global $trackdrive_config;

	// unique key for the current request
	$cache_key = base64_encode(http_build_query($optional_tokens));

	// is the number present in memory cache?
	if (empty($trackdrive_number_data[$cache_key])){
		// get the data from the primary url
		$url = $trackdrive_config['numbers_url'];
		$data = curl_request_trackdrive_number("$url?offer_key=$offer_key", $options, $optional_tokens);
	
		// if this fails, try to get it from the fallback url
		if (empty($data) || !is_array($data) || (!array_key_exists('no_tracking', $data) && !array_key_exists('number', $data) )){
			$fallback_url = $trackdrive_config['fallback_numbers_url'];
			$data = curl_request_trackdrive_number("$fallback_url?offer_key=$offer_key&fallback=true", $options, $optional_tokens);
		}

		// check if the returned data is valid
		if (!$data || !is_array($data) || !array_key_exists('number', $data) || !array_key_exists('human_number', $data['number'])){
			$trackdrive_number_data[$cache_key] = array('no_tracking' => 'true');
		} else {
			$trackdrive_number_data[$cache_key] = $data;
		}
	}
	
	return $trackdrive_number_data[$cache_key];
}

function curl_request_trackdrive_number($url, $options=array(), $optional_tokens=array())
{

	global $trackdrive_debug;
	global $td_php_v;
	// add POST data
	$fields = array(
		'referrer_url' => base64_encode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"),
		'referrer_tokens' => base64_encode(http_build_query($optional_tokens)),
		'default_number' => get_default_number($options),
		'td_php_v' => $td_php_v
	);

	$fields_string = http_build_query($fields);

	$ch = curl_init();
	$ip = $_SERVER['REMOTE_ADDR'];
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// get http header for cookies
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X_FORWARDED_FOR: $ip", 'Expect:'));
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($ch, CURLOPT_TIMEOUT, 2);

	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


	// forward current cookies to curl
	$cookies = array();
	foreach ($_COOKIE as $key => $value)
	{
		if ($key != 'Array')
		{
			$cookies[] = $key . '=' . $value;
		}
	}
	curl_setopt( $ch, CURLOPT_COOKIE, implode(';', $cookies) );
	// Stop session so curl can use the same session without conflicts
	session_write_close();

	$response = curl_exec($ch);

    $curl_errno = curl_errno($ch);
    $curl_error = curl_error($ch);

	curl_close($ch);

	// Session restart
	session_start();

	$trackdrive_debug = $response;

    if ($curl_errno > 0) {
		$body = false;
	} else if (empty($response)){
		$body = false;
	} else {
		// Seperate header and body
		list($header, $body) = explode("\r\n\r\n", $response, 2);

		try {
			$body = json_decode($body, true);
		} catch(Exception $e) {
			$body = array('status' => 500);
		}

		// extract cookies form curl and forward them to browser
		preg_match_all('/^(Set-Cookie:\s*[^\n]*)$/mi', $header, $cookies);
		foreach($cookies[0] AS $cookie)
		{
			$cookie = str_replace('.trackdrive.net', '.'.$_SERVER['SERVER_NAME'], $cookie);
			header($cookie, false);
		}
	}

	return $body;
}

function submit_scheduler_lead($schedule_lead_token, $caller_id, $options=array()){
	return submit_trackdrive_lead(array(
		'schedule_lead_token' => $schedule_lead_token,
		'caller_id' => $caller_id,
	), $options);
}

function submit_offer_lead($offer_lead_token, $caller_id, $options=array()){
	$fields = array(
		'offer_lead_token' => $offer_lead_token,
		'caller_id' => $caller_id,
	);
	return submit_trackdrive_lead($fields, $options);
}

function submit_trackdrive_lead($fields, $options=array())
{
	global $trackdrive_config;
	global $td_php_v;

	$url = $trackdrive_config['leads_url'];

	// add POST data
	$fields['td_php_v'] = $td_php_v;
	
	// add optional arguments
	if (array_key_exists('email', $options) && !empty($options['email'])){
		$fields['email'] = $options['email'];
	}

	if (array_key_exists('expires_in', $options) && !empty($options['expires_in'])){
		$fields['expires_in'] = $options['expires_in'];
	}

	if (array_key_exists('data', $options) && !empty($options['data'])){
		$fields['data'] = $options['data'];
	}

	$fields_string = http_build_query($fields);

	$ch = curl_init();
	$ip = $_SERVER['REMOTE_ADDR'];
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// get http header for cookies
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X_FORWARDED_FOR: $ip", 'Expect:'));
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1);

	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


	// forward current cookies to curl
	$cookies = array();
	foreach ($_COOKIE as $key => $value)
	{
		if ($key != 'Array')
		{
			$cookies[] = $key . '=' . $value;
		}
	}
	curl_setopt( $ch, CURLOPT_COOKIE, implode(';', $cookies) );
	// Stop session so curl can use the same session without conflicts
	session_write_close();

	$response = curl_exec($ch);

	$curl_errno = curl_errno($ch);
	$curl_error = curl_error($ch);

	curl_close($ch);

	// Session restart
	session_start();

	$trackdrive_debug = $response;

	if ($curl_errno > 0) {
		$body = false;
	} else if (empty($response)){
		$body = false;
	} else {
		// Seperate header and body
		list($header, $body) = explode("\r\n\r\n", $response, 2);

		// extract cookies form curl and forward them to browser
		preg_match_all('/^(Set-Cookie:\s*[^\n]*)$/mi', $header, $cookies);
		foreach($cookies[0] AS $cookie)
		{
			$cookie = str_replace('.trackdrive.net', '.'.$_SERVER['SERVER_NAME'], $cookie);
			header($cookie, false);
		}

		try {
			$body = json_decode($body, true);
		} catch(Exception $e) {
			$body = array('status' => 500);
		}

	}

	return $body;
}

function trackdrive_get_default_tokens()
{
	$full_url = $_SERVER['REQUEST_URI'];
	$osversion = trackdrive_get_os();
	return array(
		'full_url' => $full_url,
		'source_host' => $_SERVER['HTTP_HOST'],
		'source_pathname' => parse_url( $full_url, PHP_URL_PATH ),
		'source_query' => parse_url( $full_url, PHP_URL_QUERY ),
		'ip' => $_SERVER['REMOTE_ADDR'],
		'useragent' => $_SERVER['HTTP_USER_AGENT'],
		'osversion' => $osversion,
		'os' => strtok($osversion, " "),
		'browser' => trackdrive_get_browser(),
		'browserversion' => trackdrive_get_browser_version()
		);
}

// Get the browser, browserversion, os, and osversion from the user agent
function trackdrive_get_os() {
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$os_platform    =   "Unknown OS Platform";
	$os_array       =   array(
		'/windows nt 10.0/i'    =>  'Windows 10',
		'/windows nt 6.3/i'     =>  'Windows 8.1',
		'/windows nt 6.2/i'     =>  'Windows 8',
		'/windows nt 6.1/i'     =>  'Windows 7',
		'/windows nt 6.0/i'     =>  'Windows Vista',
		'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
		'/windows nt 5.1/i'     =>  'Windows XP',
		'/windows xp/i'         =>  'Windows XP',
		'/windows nt 5.0/i'     =>  'Windows 2000',
		'/windows me/i'         =>  'Windows ME',
		'/win98/i'              =>  'Windows 98',
		'/win95/i'              =>  'Windows 95',
		'/win16/i'              =>  'Windows 3.11',
		'/macintosh|mac os x/i' =>  'Mac OS X',
		'/mac_powerpc/i'        =>  'Mac OS 9',
		'/linux/i'              =>  'Linux',
		'/ubuntu/i'             =>  'Ubuntu',
		'/iphone/i'             =>  'iPhone',
		'/ipod/i'               =>  'iPod',
		'/ipad/i'               =>  'iPad',
		'/android/i'            =>  'Android',
		'/blackberry/i'         =>  'BlackBerry',
		'/webos/i'              =>  'Mobile'
		);
	foreach ($os_array as $regex => $value) {
		if (preg_match($regex, $useragent)) {
			$os_platform    =   $value;
		}
	}
	return $os_platform;
}

function trackdrive_get_browser() {
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$browser_name        =   "Unknown Browser";
	$browser_array  =   array(
		'/edge/i'       =>  'Microsoft Edge',
		'/msie/i'       =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
		);

	foreach ($browser_array as $regex => $value) {
		if (preg_match($regex, $useragent)) {
			$browser_name    =   $value;
		}
	}
	return $browser_name;
}

function trackdrive_get_browser_version() {
	$version= "";
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$browser = trackdrive_get_browser();
	$known = array('Version', $browser, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $useragent, $matches)) {
        // we have no matching number just continue
	}

    // see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
		if (strripos($useragent,"Version") < strripos($useragent,$browser)){
			$version= $matches['version'][0];
		} else {
			$version= $matches['version'][1];
		}
	} else {
		$version= $matches['version'][0];
	}

    // check if we have a number
	if ($version==null || $version=="") {$version="?";}
	return $version;
}

if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 10) {
	    $characters = 'abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

