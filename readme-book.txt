* there are no files to distribute to teh Apache/PHP server, we will just copy files to the CDN and adjust the Tumblr theme... this will help us avoid any problems with iframe implementations which aren't needed for this simpler design
* the contents of the /cdn/book folder should be uploaded so they are at http://stage.sonypictures.com/origin-flash/movies/americanhustle/tumblr/book

* installing this on the Tumblr theme requires the following steps:
  * log in to tumblr account
  * click the gear icon along the top
  * select the tumblr blog you want to add this to from the apps list along the left side of the screen
  * in the form that appears, click the "customize" button in the theme section
  * in the top of the left grey pane, under "Custom theme" click "Edit HTML >"
  * in the HTML source, scroll to the bottom and near line 1817, insert this line right below the closing </script> tag: 
  	<script src="http://stage.sonypictures.com/origin-flash/movies/americanhustle/tumblr/book/js/book.js"></script>
  * update the preview, then click save and then the back arrow to exit
  * scroll to the bottom of the left grey pane and click "Add a page"
  * in the white form that comes up from there, click the button next to "show a link to this page" and enter "book"
  * in the second row, set the url to be {blog name}/book
  * leave page title blank
  * in the content region, click the HTML button and paste this: 
  	<div id="book"></div>
  * update the preview, be sure its working ok, then click save and then the back arrow to exit



