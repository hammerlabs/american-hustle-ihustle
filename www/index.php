<?php
//readfile("test-iframe.html");

/*
320w x 140h

label_centered-1.jpg
convert -background black -fill #cfcfcf -font RaleWay -pointsize 16 -size 320x140 -gravity South label:"IF YOU EVER HOLD\nTHE DOOR OPEN FOR SOMEONE\nJUST SO YOU CAN CHECK THEM OUT." label_centered.jpg

label_centered-2.jpg
convert -background black -fill #cfcfcf -font RaleWay -pointsize 16 -density 216 -resample 72 -size 960x420 -gravity South label:"IF YOU EVER HOLD\nTHE DOOR OPEN FOR SOMEONE\nJUST SO YOU CAN CHECK THEM OUT." label.png

convert -background none -fill #ffffff -font RaleWay -pointsize 16 -interline-spacing 22 -density 216 -resample 72 -size 960x420 -gravity South caption:"IF YOU EVER HOLD\nTHE DOOR OPEN FOR SOMEONE\nJUST SO YOU CAN CHECK THEM OUT." label.png

composite -gravity center -geometry +0-90 label.png base-image.png sample2.jpg

*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>American Hustle | iHustle</title>

        <link href='http://fonts.googleapis.com/css?family=Baumans|Raleway' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link href='assets/css/normalize.min.css' rel='stylesheet' type='text/css'>
        <link href='assets/css/main.css' rel='stylesheet' type='text/css'>

        <script src="assets/js/libs/jquery-1.10.1.min.js" type="text/javascript"></script>  
        <script src="assets/js/libs/jquery.queryloader2.js" type="text/javascript"></script>  
        <script src="assets/js/libs/jquery.textareaCounter.plugin.js" type="text/javascript"></script>  
    </head>
    <body>
        <div id="site_holder">
            <div id="site_content">
                <div id="title">WE ALL HUSTLE TO SURVIVE</div>
                <div id="step1">
                	<div class="share_image sample">
                		<div class="preview_holder">
	                		<div class="preview_text"></div>
                		</div>
                	</div>
                	<div class="inputbox">
	                	<textarea id="user_input" placeholder="Tell us how you hustle..."></textarea>
                	</div>
                	<div class="info">Please check your message before submitting.</div>
                	<a class="button sample">VIEW SAMPLE</a>
                	<a class="button submit">SUBMIT</a>
                </div>
                <div id="loading">
                	hustling...
                </div>
                <div id="step2">
                	<div class="share_image"></div>
                	<div class="inputbox">Your hustle has been submitted!<br/><br/>Now share it!</div>
                	<div class="social_holder">
	                	<span class="social facebook"></span>
	                	<span class="social twitter"></span>
	                	<span class="social tumblr"></span>
	                	<span class="social google"></span>
	                	<span class="social pinterest"></span>
                	</div>
                	<a class="button seeall">SEE ALL</a>
                </div>
            </div>
        </div>
        <script src="assets/js/libs/TweenMax.min.js" type="text/javascript"></script>  
        <script src="assets/js/share.js" type="text/javascript"></script>  
        <script src="assets/js/main.js" type="text/javascript"></script>  
    </body>
</html>