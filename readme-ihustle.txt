* place the contents of the /www folder in the Apache/PHP server's web root 
* the contents of the /cdn folder can be placed on the CDN web root
* new images are saved to the www/ihustle/user_images folder and PHP will need permissions to write files there
* the www/ihustle/settings.php file has all teh relevant configuration info centralized in it, but you'll likely only need to change the test and production Tumblr settings for CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET
* if the CDN paths have changed from what you sent me, you can edit them here too

* installing this on the Tumblr theme requires the following steps:
  * log in to tumblr account
  * click the gear icon along the top
  * select the tumblr blog you want to add this to from the apps list along the left side of the screen
  * in the form that appears, click the "customize" button in the theme section
  * scroll to the bottom of the left grey pane and click "Add a page"
  * in the white form that comes up from there, click the button next to "show a link to this page" and enter "ihustle"
  * in the second row, set the url to be {blog name}/ihustle
  * leave page title blank
  * in the content region, click the HTML button and paste this: <iframe height="460" id="ihustle_frame" frameBorder="0" scrolling="no" src="http://stage.sonypictures.com/movies/americanhustle/tumblr/ihustle/" width="680"></iframe>
  * change the URL in the src attribute of the iframe tag to point whereever you have the site installed
  * update the preview, be sure its working ok, then click save and then the back arrow to exit
  * create another page now by clicking the "Add a page" button again
  * in the white form that comes up from there, click the button next to "show a link to this page" and enter "ihustle gallery"
  * in the second row, set the url to be {blog name}/tagged/ihustle
  * leave page title blank
  * in the content region, just enter a period, this page is a special/magic page and preview won't work
  * click save and then the back arrow to exit

if you don't have a CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET:
  * Register the Application in Tumblr: http://www.tumblr.com/oauth/apps
  * Add OAuth Consumer Key and Secret Key to www/ihustle/settings.php variables
  * edit connect.php to have the keys as well and then set the URL to $callback_url
  * Generate the Token by loading connect.php into your browser
  * Load the connect.php in the browser which will load callback.php and provide the tokens you will need.
  * Add new tokens to the variables to www/ihustle/settings.php
