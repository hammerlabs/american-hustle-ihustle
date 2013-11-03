<?php
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
function annotateLineSpaced($image, $draw, $x, $y, $ang, $lines, $spacing) {
   //$lines = explode("\n", $text);
   foreach ($lines as $line) {
      $image->annotateImage($draw, $x, $y, $ang, $line);
      $y += $spacing;
   }
}

function wordWrapAnnotation(&$image, &$draw, $textlines, $maxWidth)
{
    $lines = array();
    $i = 0;
    $j = 0;
    //$lineHeight = 0;
    while ($j < count($textlines)) {
	    $i = 0;
	    $words = explode(" ", $textlines[$j]);
 	    while($i < count($words) ) {
	        $currentLine = $words[$i];
	        if($i+1 >= count($words)) {
	            $lines[] = $currentLine;
		    	print("1: used all words in line: ".$currentLine."\n");
	            break;
	        }
	        //Check to see if we can add another word to this line
	        $metrics = $image->queryFontMetrics($draw, $currentLine . ' ' . $words[$i+1]);
	        while($metrics['textWidth'] <= $maxWidth) {
	            //If so, do it and keep doing it!
	            $currentLine .= ' ' . $words[++$i];
	            if($i+1 >= count($words)) {
	                break;
	            }
	            $metrics = $image->queryFontMetrics($draw, $currentLine . ' ' . $words[$i+1]);
	        }
	        //We can't add the next word to this line, so loop to the next line
	        $lines[] = $currentLine;
	        $i++;
	        //Finally, update line height
	        //if($metrics['textHeight'] > $lineHeight)
	            //$lineHeight = $metrics['textHeight'];
	    }
	    $j++;
	    //return array($lines, $lineHeight);
    }
    return $lines;
}