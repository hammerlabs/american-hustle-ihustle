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
        <link href='<?php echo CDN;?>css/bookblock.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo CDN;?>css/main.css' rel='stylesheet' type='text/css'>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script src="<?php echo CDN;?>js/modernizr.custom.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/jquerypp.custom.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/jquery.bookblock.js" type="text/javascript"></script>  
        <script type="text/javascript">
            <?php echo "var config = ". json_encode($config) . ";";?>  
        </script>  

    </head>
    <body class="">
        <div class="content layer">
            <div class="look_inside"><img src="<?php echo CDN;?>img/look_inside.jpg"></div>
            <div id="bb-bookblock" class="bb-bookblock">
                <div class="bb-item">
                    <a href="#"><img src="<?php echo CDN;?>img/front.jpg" alt="image01"/></a>
                </div>
                <div class="bb-item">
                    <a href="#"><img src="<?php echo CDN;?>img/page1.jpg" alt="image02"/></a>
                </div>
                <div class="bb-item">
                    <a href="#"><img src="<?php echo CDN;?>img/page1.jpg" alt="image03"/></a>
                </div>
                <div class="bb-item">
                    <a href="#"><img src="<?php echo CDN;?>img/page1.jpg" alt="image04"/></a>
                </div>
                <div class="arrow_left"></div>
                <div class="arrow_right"></div>
            </div>
        </div>

       <div id="footer">
            <div id="footer_container">
                <div id="share_links">
                    <span class="social facebook"></span>
                    <span class="social twitter"></span>
                    <span class="social tumblr"></span>
                    <span class="social google"></span>
                    <span class="social pinterest"></span>
                </div>

                <div id="button_links">
                    <a href="http://www.americanhustle-movie.com/site/" target="_blank" class="button">VISIT OFFICIAL SITE</a><span>&nbsp;</span>
                    <a href="http://www.americanhustle-movie.com/releasedates/" target="_blank" class="button release_dates">WORLDWIDE RELEASE DATES</a>
                </div>

                <div id="left_container">
                    <div id="movie_company_logos"><img src="<?php echo CDN;?>img/movie_companies.jpg" /></div>
                </div>

                <div id="right_container">
                    <div id="ratings">
                        <img src=
                        "<?php echo CDN;?>img/rating.jpg" />
                        <span class="title">For Rating Reasons:</span> <a 
                        href="http://filmratings.com/" target="_blank">FILMRATINGS.COM</a>,
                        <a href="http://mpaa.org/" target="_blank">MPAA.ORG</a>
                    </div>
                </div>

                <div id="legal_links">
                    <div id="copyright">
                        &copy; 2013 Sony Pictures Digital Productions Inc. <span>All rights
                        reserved.</span>
                    </div>

                    <div id="links">
                        <a href="http://www.sonypictures.net/corp/privacy.html" target="_blank">PRIVACY
                        POLICY</a> | <a href="http://www.sonypictures.net/corp/tou.html" 
                        target="_blank">TERMS OF USE</a> | <a 
                        href="http://www.sonypictures.net/corp/privacy.html#information-we-collect-automatically"
                         target="_blank">COOKIES</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo CDN;?>js/share.js" type="text/javascript"></script>  
        <script src="<?php echo CDN;?>js/main.js" type="text/javascript"></script>  

    </body>
</html>
