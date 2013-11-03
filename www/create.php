<?php
require_once('_settings.php');    
require_once('includes/im_helper.php');    
require_once('includes/tumblr_helper.php');    

$oauth_response = authorizeToken();
if ($oauth_response->success === false) {
	header('Content-Type: application/json');
	print( json_encode( $oauth_response ) );
	exit;
}
$usercontent = createUserImage( $_GET["text"] );
$usercontent["oauth_response"] = $oauth_response;
$usercontent["post_response"] = postPhoto($usercontent["url"], "#iHustle #AmericanHustle");
header('Content-Type: application/json');
print( json_encode( $usercontent ) );
exit;

function createUserImage($printtext) {
	$text = new ImagickDraw();
	$text->setGravity( Imagick::GRAVITY_SOUTH );
	$text->setFont( "assets/fonts/Raleway-Medium.ttf" );
	$text->setFontSize( 16 );
	$text->setFillColor( 'white' );
	$canvas = new Imagick();
	$canvas->newImage( 320, 140, "none" );
	$canvas->setImageFormat( 'png' );
	$printtext = preg_split("/[\r|\n]+/", $printtext);
	$printtext = wordWrapAnnotation( $canvas, $text, $printtext, 320);
	annotateLineSpaced($canvas, $text, 0, 0, 0, array_reverse($printtext), 27);
	$canvas->drawImage( $text );
	$base = new Imagick();
	$base->readImage( "assets/img/base-image.png" ); 
	$base->compositeImage( $canvas, Imagick::COMPOSITE_DEFAULT, 24, 24 );
	$base->setImageFormat('jpeg');
	$imageName = 'ah_ihustle_'.date("U").'.jpg';
	$imageUrl = 'user_images/'.$imageName;
	$base->writeImage($imageUrl);
	$base->clear(); 
	$canvas->clear(); 
	$text->clear();
	return array('url'=>$imageUrl,'name'=>$imageName,'text'=>$printtext);
}
