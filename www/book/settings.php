<?php
error_reporting(E_ALL);

$title = "American Hustle | Book"; 
$desc = "Check out #AmericanHustle on Tumblr and tell the world how you hustle. In theaters December 2013."; 
$url = "http://www.AmericanHustleMovie.Tumblr.com"; 
$image = "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg"; 
$facebook_url = "https://www.facebook.com/AmericanHustle";    
$keywords = "American Hustle Movie, American Hustle, drama, con, crime, Amy Adams, Christian Bale, Jeremy Renner, Jennifer Lawrence, David O. Russell, Eric Warren Singer";    
$og_title = "American Hustle | iHustle | Sony Pictures";
$share_tags = "#AmericanHustle";    
$share_title = "American Hustle";    
$share_content = "This is how #iHustle. Tell the world how you hustle at www.AmericanHustleMovie.Tumblr.com. In theaters December 2013."; 
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


setEnvironment($_environments_list);
switch (ENVIRONMENT) {
	case 'development':
		define("CDN", "../../cdn/book/");
		define("BLOGNAME", "ahdev.tumblr.com");
		break;

	case 'testing':
		define("CDN", "http://stage.sonypictures.com/origin-flash/movies/americanhustle/tumblr/book/");
		define("BLOGNAME", "americanhustlemoviedev.tumblr.com"); 
		break;

	case 'production':
		error_reporting(0);
		define("CDN", "http://flash.sonypictures.com/movies/americanhustle/tumblr/book/");    
		define("BLOGNAME", "americanhustlemovie.tumblr.com");            
		break;

	default:
		exit('The application environment is not set correctly.');
}

$share_blogname = BLOGNAME; 
$webroot = curPagePath(); 