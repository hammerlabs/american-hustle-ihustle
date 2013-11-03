<?php

error_reporting(E_ALL);   
  
define("CONSUMER_KEY", "CTz2LZ01VUTVhdoib2XM9wDvdE5bphn9wmsi3zyTmYrtmTuMhD");
define("CONSUMER_SECRET", "hod74WSG3ZLRJs2tdOO0FWRuxt4gRRyxnzJbj2auC9E4FD5iI0");
define("OAUTH_TOKEN", "ri7IoyC2uNo56yRdXE4qgzAMepQPdaHt28FLEBXYu6kSSb2ixv");
define("OAUTH_SECRET", "LARTp5dptZN6X6wO2D8bXPMyishfz4nExEm1x3znmIfwjsP1gx"); 
define("CDN", "http://cdn-dev.triggerglobal.com/sony/americanhustle/gif_generator/cdn/");

//define("CDN", "http://stage.sonypictures.com/movies/americanhustle/tumblr/gifgenerator/");    
//define("CDN", "http://sonypictures.com/movies/americanhustle/tumblr/gifgenerator/");    
define("BLOGNAME", "ahdev.tumblr.com");     
//define("BLOGNAME", "americanhustlemoviedev.tumblr.com"); 
//define("BLOGNAME", "americanhustlemovie.tumblr.com");            
     
$req_url = 'http://www.tumblr.com/oauth/request_token';
$authurl = 'http://www.tumblr.com/oauth/authorize';
$acc_url = 'http://www.tumblr.com/oauth/access_token';
     	
require_once('im_helper.php');    
require_once('tumblr_helper.php');    

authorizeToken();   

function authorizeToken() {   

	$tum_oauth = new TumblrOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $tum_oauth->getRequestToken();

	$_SESSION['request_token'] = $token = $request_token['oauth_token'];
	$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

	// Check the HTTP Code.  It should be a 200 (OK), if it's anything else then something didn't work.
	switch ($tum_oauth->http_code) {
	  case 200:
		postImage( createUserImage( $_GET["text"] ) );
	    break;
	default:
	    // Give an error message
		header('Content-Type: application/json');
		print( json_encode( $tum_oauth ) );
	}   

}

function postImage($usercontent) {    
	$headers = array("Host" => "http://api.tumblr.com/", "Content-type" => "application/x-www-form-urlencoded", "Expect" => "");
	$params = array("tags" => "iHustle", "data" => array(file_get_contents($usercontent["url"])), "type" => "photo");
	$blogname = BLOGNAME;    
	oauth_gen("POST", "http://api.tumblr.com/v2/blog/$blogname/post", $params, $headers);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERAGENT, "PHP Uploader Tumblr v1.0");
	curl_setopt($ch, CURLOPT_URL, "http://api.tumblr.com/v2/blog/$blogname/post");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    "Authorization: " . $headers['Authorization'],
	    "Content-type: " . $headers["Content-type"],
	    "Expect: ")
	);

	$params = http_build_query($params);

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

	$response = curl_exec($ch);  
	$response = json_decode( $response );
	$usercontent['response'] = $response;     
	if ( isset( $response->meta ) && isset( $response->meta->status ) && $response->meta->status == 201 ) {   
		$post_id = $response->response->id;
		$post_url = "http://{$blogname}/post/{$post_id}";
		$response->response->post_url = $post_url; 
		$usercontent["postId"] = $post_id;
		$usercontent["postUrl"] = $post_url;
	}
	header('Content-Type: application/json');
	print( json_encode( $usercontent ) );
}    
