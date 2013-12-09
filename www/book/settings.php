<?php
error_reporting(E_ALL);

$title = "American Hustle | Book"; 
$desc = "See the book that inspired the film. American Hustle In theaters December 2013."; 
$url = "http://www.AmericanHustleMovie.Tumblr.com"; 
$image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 
$facebook_url = "https://www.facebook.com/AmericanHustle";    
$keywords = "American Hustle Movie, American Hustle, drama, con, crime, Amy Adams, Christian Bale, Jeremy Renner, Jennifer Lawrence, David O. Russell, Eric Warren Singer";    
$og_title = "American Hustle | Sony Pictures";
$share_tags = "#AmericanHustle";    
$share_title = "American Hustle";    
$share_content = "See the book that inspired the film. American Hustle In theaters December 2013."; 
$share_url = "http://www.AmericanHustle-Movie.com/feature/Book/"; 
$share_image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 

$_environments_list = array(
	'testing' => array(
		'stage.sonypictures.com'
	),
	'production' => array(
		'www.sonypictures.com',
		'www.americanhustle-movie.com'
	)
);


setEnvironment($_environments_list);
switch (ENVIRONMENT) {
	case 'development':
		define("CDN", "../../cdn/book/");
		define("BLOGNAME", "ahdev.tumblr.com");
		break;

	case 'testing':
		define("CDN", "http://stage.sonypictures.com/origin-flash/movies/americanhustle/feature/book/");
		define("BLOGNAME", "americanhustlemoviedev.tumblr.com"); 
		break;

	case 'production':
		error_reporting(0);
		define("CDN", "http://flash.sonypictures.com/movies/americanhustle/feature/book/");    
		define("BLOGNAME", "americanhustlemovie.tumblr.com");
		break;

	default:
		exit('The application environment is not set correctly.');
}

function setEnvironment($list) {
	$_host_name = $_SERVER[ 'HTTP_HOST' ];
	$_this_env = 'development'; // this is the default env
	foreach ( $list as $env_name => $env_urls ) {
		foreach ( $env_urls as $url ) {
			if ( preg_match( "/{$url}$/i", $_host_name ) ) {
				$_this_env = $env_name; // boom, we found it
				break 2;
			}
		}
	}
	define( 'ENVIRONMENT', $_this_env );
}
