<?php
error_reporting(E_ALL);

$title = "American Hustle | iHustle"; 
$desc = "Check out #AmericanHustle on Tumblr and tell the world how you hustle. In theaters December 2013."; 
$url = "http://www.AmericanHustleMovie.Tumblr.com"; 
$image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 
$facebook_url = "https://www.facebook.com/AmericanHustle";    
$keywords = "American Hustle Movie, American Hustle, drama, con, crime, Amy Adams, Christian Bale, Jeremy Renner, Jennifer Lawrence, David O. Russell, Eric Warren Singer";    
$og_title = "American Hustle | iHustle | Sony Pictures";
$share_tags = "#iHustle";    
$share_title = "American Hustle";    
$share_content = "This is how #iHustle. Tell the world how you hustle at www.AmericanHustleMovie.Tumblr.com/iHustle. In theaters December 2013."; 
$share_url = "http://www.AmericanHustleMovie.Tumblr.com"; 
$share_image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 

$_environments_list = array(
	'testing' => array(
		'stage.sonypictures.com'
	),
	'production' => array(
		'www.sonypictures.com'
	)
);

$user_images_folder = "user_images";

setEnvironment($_environments_list);
switch (ENVIRONMENT) {
	case 'development':
		define("CDN", "../../cdn/ihustle/");
		define("BLOGNAME", "ahdev.tumblr.com");
		define("CONSUMER_KEY", "CTz2LZ01VUTVhdoib2XM9wDvdE5bphn9wmsi3zyTmYrtmTuMhD");
		define("CONSUMER_SECRET", "hod74WSG3ZLRJs2tdOO0FWRuxt4gRRyxnzJbj2auC9E4FD5iI0");
		define("OAUTH_TOKEN", "ri7IoyC2uNo56yRdXE4qgzAMepQPdaHt28FLEBXYu6kSSb2ixv");
		define("OAUTH_SECRET", "LARTp5dptZN6X6wO2D8bXPMyishfz4nExEm1x3znmIfwjsP1gx"); 
		define("TWITTER_CONSUMER_KEY", "b5SgSCBxWyhao6NzykdrQ"); 
		define("TWITTER_CONSUMER_SECRET", "PjzQQxPrEazIlk3AyUfpxZ1AvFbbhVIkiS4pETfJU"); 
		break;

	case 'testing':
		define("CDN", "http://stage.sonypictures.com/origin-flash/movies/americanhustle/tumblr/ihustle/");
		define("BLOGNAME", "americanhustlemoviedev.tumblr.com"); 
		define("CONSUMER_KEY", "VTrFOn4QnQvbFZ8T99yzbA1uEbITTvjZOxHhdBJ6b5sZvTElwe");
		define("CONSUMER_SECRET", "dRtvkuC0CrNNFelkomO7h1kiNwHQBW0BhzNWUQ4j7QFRt0v9Qw");
		define("OAUTH_TOKEN", "ojLMdByU0IyDKCaMZHyq84Tifg8DxoMQzaYnfvlKsizqu0GSZs");
		define("OAUTH_SECRET", "EYBF7qfIfzbEgbj1Aw3Dq2XosPha4YWGfDh9ktqBJt6SO0exti"); 
		define("TWITTER_CONSUMER_KEY", "gUrBZNK9SUVHeH1VBhqA"); 
		define("TWITTER_CONSUMER_SECRET", "bgTEFkMMBX9QwAR7U9RcSLtiz0ndPT6X1w1gk3i7o"); 
		break;

	case 'production':
		error_reporting(0);
		define("CDN", "http://flash.sonypictures.com/movies/americanhustle/tumblr/ihustle/");    
		define("BLOGNAME", "americanhustlemovie.tumblr.com");            
		define("CONSUMER_KEY", "");
		define("CONSUMER_SECRET", "");
		define("OAUTH_TOKEN", "");
		define("OAUTH_SECRET", ""); 
		define("TWITTER_CONSUMER_KEY", "b5SgSCBxWyhao6NzykdrQ"); 
		define("TWITTER_CONSUMER_SECRET", "PjzQQxPrEazIlk3AyUfpxZ1AvFbbhVIkiS4pETfJU"); 
		break;

	default:
		exit('The application environment is not set correctly.');
}

$share_blogname = BLOGNAME; 
//$preload = createImagePreload("assets/img");
$webroot = curPagePath(); 






function setEnvironment($list) {
	$_host_name = $_SERVER[ 'HTTP_HOST' ];
	$_this_env = 'development'; // this is the default env
	foreach ( $list as $env_name => $env_urls ) {
		foreach ( $env_urls as $url ) {
			if ( preg_match( "/{$url}$/", $_host_name ) ) {
				$_this_env = $env_name; // boom, we found it
				break 2;
			}
		}
	}
	define( 'ENVIRONMENT', $_this_env );
}

function curPagePath() {
	$protocol = strtolower(array_shift(explode("/", $_SERVER["SERVER_PROTOCOL"])));
	$pathArr = explode("/", $_SERVER["SCRIPT_NAME"]);
	array_pop($pathArr);
	$path = implode("/",$pathArr)."/";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$fullpath = $protocol."://".$_SERVER["HTTP_HOST"].":".$_SERVER["SERVER_PORT"].$path;
	} else {
		$fullpath = $protocol."://".$_SERVER["HTTP_HOST"].$path;
	}
	return $fullpath;
}

function createImagePreload($dir) { 
    $root = scandir($dir); 
    foreach($root as $value) { 
        if($value === '.' || $value === '..') {continue;} 
        if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;} 
        foreach(createImagePreload("$dir/$value") as $value) { 
            $result[]=$value; 
        } 
    } 
	$preload = "\t\t<div style='display: none;''>\n";
	foreach ($result as $img){
		$preload .= "\t\t\t<img src='".CDN.str_replace("assets/", "", $img)."' />\n";
	}
	$preload .= "\t\t</div>";
	return $preload;
} 
