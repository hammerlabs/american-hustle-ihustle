<?php
//require_once('../_settings.php');    
require_once('lessc.inc.php');    

function cssUrl($url) {
	$cssUrl = str_replace(".less", ".css", $url);
	if (ENVIRONMENT == 'development') {
		$less = new lessc;
		$less->checkedCompile($url, $cssUrl);
	}
	return $cssUrl;
}