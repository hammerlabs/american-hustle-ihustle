<?php
error_reporting(E_ALL);

$title = "American Hustle | iHustle"; 
$desc = "Check out #AmericanHustle on Tumblr and tell the world how you hustle. In theaters December 2013."; 
$url = "http://ww.AmericanHustleMovie.Tumblr.com"; 
$image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 
$facebook_url = "https://www.facebook.com/LoneSurvivorFilm";    
$keywords = "Lone Survivor Mark Wahlberg Taylor Kitsch Alexander Ludwig Eric Bana Ben Foster Emile Hirsch";    
$og_title = "Follow The Latest News From The Lone Survivor";
$share_tags = "#iHustle #AmericanHustle";    
$share_title = "American Hustle";    
$share_content = "Check out #AmericanHustle on Tumblr and tell the world how you hustle. In theaters December 2013. http://ww.AmericanHustleMovie.Tumblr.com"; 
$share_url = "http://www.AmericanHustleMovie.Tumblr.com"; 
$share_image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 
$share_blogname = BLOGNAME; 
$webroot = curPagePath(); 

$_environments_list = array(
	'testing' => array(
		'stage.sonypictures.com'
	),
	'production' => array(
		'www.sonypictures.com'
	)
);
setEnvironment();
switch (ENVIRONMENT)
{
	case 'development':
		define("CDN", "assets/");
		define("BLOGNAME", "ahdev.tumblr.com");     
		define("CONSUMER_KEY", "CTz2LZ01VUTVhdoib2XM9wDvdE5bphn9wmsi3zyTmYrtmTuMhD");
		define("CONSUMER_SECRET", "hod74WSG3ZLRJs2tdOO0FWRuxt4gRRyxnzJbj2auC9E4FD5iI0");
		define("OAUTH_TOKEN", "ri7IoyC2uNo56yRdXE4qgzAMepQPdaHt28FLEBXYu6kSSb2ixv");
		define("OAUTH_SECRET", "LARTp5dptZN6X6wO2D8bXPMyishfz4nExEm1x3znmIfwjsP1gx"); 
		break;

	case 'testing':
		define("CDN", "http://stage.sonypictures.com/origin-flash/movies/americanhustle/tumblr/hustle/");
		define("BLOGNAME", "americanhustlemoviedev.tumblr.com"); 
		define("CONSUMER_KEY", "");
		define("CONSUMER_SECRET", "");
		define("OAUTH_TOKEN", "");
		define("OAUTH_SECRET", ""); 
		break;

	case 'production':
		error_reporting(0);
		define("CDN", "http://flash.sonypictures.com/movies/americanhustle/tumblr/hustle/");    
		define("BLOGNAME", "americanhustlemovie.tumblr.com");            
		define("CONSUMER_KEY", "");
		define("CONSUMER_SECRET", "");
		define("OAUTH_TOKEN", "");
		define("OAUTH_SECRET", ""); 
		break;

	default:
		exit('The application environment is not set correctly.');
}


function setEnvironment() {
	$_host_name = $_SERVER[ 'HTTP_HOST' ];
	$_this_env = 'development'; // this is the default env
	foreach ( $_environments_list as $env_name => $env_urls ) {
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
