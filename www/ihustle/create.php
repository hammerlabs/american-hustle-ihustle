<?php
require_once('settings.php');    
require_once('includes/im_helper.php');    
require_once('includes/tumblr_helper.php');    

$oauth_response = authorizeToken();
if (!is_array($oauth_response) && $oauth_response->success === false) {
	header('Content-Type: application/json');
	print( json_encode( $oauth_response ) );
	exit;
}
$usercontent = createUserImage( cleanData($_GET["text"]) );
$usercontent["oauth_response"] = $oauth_response;
$usercontent["post_response"] = postPhoto($usercontent["url"], $share_tags);
header('Content-Type: application/json');
print( json_encode( $usercontent ) );
exit;

function cleanData($str) {
    $str = trim($str);
    $str = strtoupper($str);
    //$str = urldecode($str);
    //$str = filter_var($str, FILTER_SANITIZE_STRING,!FILTER_FLAG_STRIP_LOW);
    return $str ;
}

function createUserImage($printtext) {
	$text = new ImagickDraw();
	$text->setGravity( Imagick::GRAVITY_SOUTH );
	$text->setFont( "fonts/Raleway-Medium.ttf" );
	$text->setFontSize( 44 );
	$text->setFillColor( 'white' );
	$canvas = new Imagick();
	$canvas->newImage( 890, 390, "none" );
	$canvas->setImageFormat( 'png' );
	$printtext = preg_split("/[\r|\n]+/", $printtext);
	$printtext = wordWrapAnnotation( $canvas, $text, $printtext, 890);
	annotateLineSpaced($canvas, $text, 0, 0, 0, array_reverse($printtext), 75);
	$canvas->drawImage( $text );
	$base = new Imagick();
	$base->readImage( "base-big.png" ); 
	$base->compositeImage( $canvas, Imagick::COMPOSITE_DEFAULT, 67, 30 );
	$base->setImageFormat('jpeg');
	$imageName = 'ah_ihustle_'.date("U").'.jpg';
	$imageUrl = $user_images.'/'.$imageName;
	$base->writeImage($imageUrl);
	$base->clear(); 
	$canvas->clear(); 
	$text->clear();
	return array('url'=>$imageUrl,'name'=>$imageName,'text'=>$printtext);
}
