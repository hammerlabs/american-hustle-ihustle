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


**************
Setting up a Twitter Application for ihustle sharing

You'll need to create a Twitter Application to allow ihustle to share the ihustle images as tweets on behalf of
the user. Then you'll need to configure ihustle to use this application for sharing, by specifying the application's CONSUMER_KEY and CONSUMER_SECRET strings.

This process needs to be repeated for each environment, since you'll need a different twitter application for each. 
Steps to create and configure a twitter application for an environment:
- Log in at dev.twitter.com
- Open the user options drop down (click on avatar at header), and select "My Applications"
- Click on "Create new Application"
- On the Create an Application form, enter an appropiate Name and Description for the app. For Website you can use the main tumblr's blog url. For callback you need to set a url pointing to /ihustle/twitteroauth under the domain and path where the ihustle app is installed for the environment you're creating the app for. For staging that means using a callback url being: http://stage.sonypictures.com/movies/americanhustle/tumblr/ihustle/twitteroauth
-Agree with terms by checking the agreement box, fill in the captcha, and hit "Create your Twitter Application"
-After the app has been created, switch to the "Settings" tab and change the Application Type to "Read and Write"
-This is a good moment to change the icon of the application.
-Go back to the "Details" tab and take note of the values for "Consumer key" and "Consumer Secret" under the Oauth Settings.
-Edit the file /www/ihustle/settings.php, and copy those values into the define statements for them under the environment case corresponding with the environment you're creating the twitter application for. These look like this (replace the dots with the consumer key and secret you got from the Details tab):
    define("TWITTER_CONSUMER_KEY", "...."); 
    define("TWITTER_CONSUMER_SECRET", "...."); 
