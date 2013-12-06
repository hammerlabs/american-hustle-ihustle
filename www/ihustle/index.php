<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>

<?php        

require_once 'settings.php';   
require_once 'includes/browser_helper.php';    

$config = array(
    "user_browser" => $user_browser,
    "device_type" => $device_type,
    "browser_version" => $device_type,
    "browser_type" => $browser_type,
    "user_agent" => $user_agent,
    "modern_browser" => $modern,
    "view_port" => $view_port,
    "site_url" => $url,
    "cdn" => CDN,
    "share_blogname" => $share_blogname,
    "share_tags" => $share_tags,
    "share_title" => $share_title,
    "share_content" => $share_content,
    "share_url" => $share_url,
    "share_image" => $share_image,
    "webroot" => $webroot,
    "user_images_folder" => $user_images_folder,
    "environment" => ENVIRONMENT 
);
?>      
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $title; ?></title>      
        <meta name="description" content="<?php echo $desc; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">              
        <meta name="viewport" content="<?php echo $view_port; ?>">  
            
        <meta property="og:title" content="<?php echo $og_title; ?>" />  
        <meta property="og:description" content="<?php echo $desc; ?>" />
        <meta property="og:url" content="<?php echo $url; ?>" />
        <meta property="og:image" name="thumb" content="<?php echo $image; ?>" />  
        <meta property="og:type" content="movie" />
        <meta property="og:site_name" content="<?php echo $title; ?>" />  

        <link href='http://fonts.googleapis.com/css?family=Baumans|Raleway' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link href='<?php echo CDN;?>css/normalize.min.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo CDN;?>css/main.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo CDN;?>css/mobile.css' rel='stylesheet' type='text/css'>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/libs/jquery.queryloader2.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/libs/jquery.textareaCounter.plugin.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/wordlist.js" type="text/javascript"></script>  
        <script type="text/javascript">
            <?php echo "var config = ". json_encode($config) . ";";?>  
        </script>  
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
                        <div class="close"></div>
                	</div>
                	<div class="inputbox">
	                	<textarea id="user_input" placeholder="Tell us how you hustle..."></textarea>
                	</div>
                	<!--div class="info">Please check your message before submitting.</div-->
                    <div class="legal">By adding text and hitting “SUBMIT” below, I understand that my text may appear in the iHustle Gallery of this page, I certify that I have read and agree to this iHustle feature’s <a class="terms" href="http://www.sonypictures.net/corp/tos.html" target="_blank">Terms of Use</a>, I understand that my text is a “User Submission” and I specifically represent that it was written solely by me and is not offensive or otherwise in violation of such terms.</div>
                    <a class="button submit">SUBMIT</a>
                	<a class="button sample">VIEW SAMPLE</a>
                </div>
                <div id="loading">
                	hustling<br/><br/><img src="<?php echo CDN;?>img/482.GIF" />
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
                    <a class="button seeall" target="_parent">SEE ALL</a>
                    <a class="button back" target="_parent">CREATE ANOTHER</a>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <img src="<?php echo CDN;?>img/482.GIF">
            <img src="<?php echo CDN;?>img/close.png">
            <img src="<?php echo CDN;?>img/base-image.jpg">
            <img src="<?php echo CDN;?>img/facebook.png">
            <img src="<?php echo CDN;?>img/google.png">
            <img src="<?php echo CDN;?>img/pinterest.png">
            <img src="<?php echo CDN;?>img/sample.jpg">
            <img src="<?php echo CDN;?>img/sample1.jpg">
            <img src="<?php echo CDN;?>img/textarea-bg.png">
            <img src="<?php echo CDN;?>img/textarea-error-bg.png">
            <img src="<?php echo CDN;?>img/textarea-sample-bg.png">
            <img src="<?php echo CDN;?>img/tumblr.png">
            <img src="<?php echo CDN;?>img/twitter.png">
        </div>   

        <script src="<?php echo CDN;?>js/libs/TweenMax.min.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/share.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/main.js" type="text/javascript"></script>  
<!--

        <div id="omniturecode">
            <script type="text/javascript" src="http://www.sonypictures.com/global/scripts/s_code.js"></script>
            <script type="text/javascript">                                                                                 
                s.pageName='us:movies:americanhustle:tumblr:ihustle:index.html'
                s.channel=s.eVar3='us:movies'
                s.prop3=s.eVar23='us:movies:americanhustle:ihustle'
                s.prop4=s.eVar4='us:americanhustle'
                s.prop5=s.eVar5='us:movies:blog'
                s.prop11='us'     
                var s_code=s.t();if(s_code)document.write(s_code) 
            </script>   
        </div> 
-->
    </body>
</html>
