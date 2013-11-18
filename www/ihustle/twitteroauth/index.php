<?php
// use composers autoload if it exists, or require directly if not
require __DIR__.DIRECTORY_SEPARATOR.'tmhOAuthIHustle.php';
$tmhOAuth = new tmhOAuthIHustle();




if ($tmhOAuth->auth()){

  $image = __DIR__ . DIRECTORY_SEPARATOR .'../user_images/'. 'ah_ihustle_1384813900.jpg';
  $name  = basename($image);
  $status = "I hustle...";

  $code = $tmhOAuth->user_request(array(
    'method' => 'POST',
    'url' => $tmhOAuth->url('1.1/statuses/update_with_media'),
    'params' => array(
      'media[]'  => "@{$image};type=image/jpeg;filename={$name}",
      'status'   => $status,
    ),
    'multipart' => true,
  ));


}
else{
  echo "Error: You need to authorize our app at twitter to share.";
}

