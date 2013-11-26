<?php
// use composers autoload if it exists, or require directly if not
require_once('../settings.php');    

require __DIR__.DIRECTORY_SEPARATOR.'tmhOAuthIHustle.php';
$tmhOAuth = new tmhOAuthIHustle();


$image="";
$status="";

if (isset($_GET["img"])){
  $image = str_replace(array('.', '/', '\\'), "", filter_var($_GET["img"], FILTER_SANITIZE_URL));
  $name  = basename($image);
  $_SESSION["share_img"]=$image;
}else{
  if (isset($_SESSION["share_img"])){
    $image = $_SESSION["share_img"];
    $name  = basename($image);
  }
}

if (isset($_GET["status"])){
 $status =$_GET["status"];
 $_SESSION["share_status"]=$status;
}
else{
  if (isset($_SESSION["share_status"])){
    $status =$_SESSION["share_status"];   
  }
}

if ($image!="" && $status!=""){
  if ($tmhOAuth->auth()){
     $image= __DIR__ . DIRECTORY_SEPARATOR . $user_images_folder . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $image);
     $code = $tmhOAuth->user_request(array(
      'method' => 'POST',
      'url' => $tmhOAuth->url('1.1/statuses/update_with_media'),
      'params' => array(
        'media[]'  => "@{$image};type=image/jpeg;filename={$name}",
        'status'   => $status,
      ),
      'multipart' => true,
    ));

    header("Location: " . "twitter_success.php");
   
  }
  else{
   var_dump( $tmhOAuth->response);
    echo "Error: You need to authorize our app at twitter to share.";
  }
}
else{
  echo "Nothing to share";
}
