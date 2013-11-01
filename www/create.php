<?php
/*

* the server needs access to the Raleway font found in /assets/fonts/Raleway-Medium.ttf
* we need to insert the user's text in this first command, converting line breaks to "\n"

convert -background none -fill #ffffff -font RaleWay -pointsize 16 -interline-spacing 22 -density 216 -resample 72 -size 960x420 -gravity South caption:"IF YOU EVER HOLD\nTHE DOOR OPEN FOR SOMEONE\nJUST SO YOU CAN CHECK THEM OUT." label.png

* that will create an image named label.png and we need to combine that with /assets/img/base-image.png for the final image using this command

composite -gravity center -geometry +0-90 label.png base-image.png sample2.jpg

* be sure that we store images in the same sort of way we did in machete with a guid or whatever
* I need to be able to tell Sony what sort of permissions PHP needs to write temp files and final files

*/
// the text is passed in the GET
$text = $_GET["text"];
//just pass back a relative URL to the root of the site for where you store the user images
$imageUrl = "assets/img/sample1.jpg";
header('Content-Type: application/json');
$arr = array ('url'=>$imageUrl,'text'=>$text);
echo json_encode($arr);
