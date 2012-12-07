<?php

function doublemax($mylist){
  $maxvalue=max($mylist);
  while(list($key,$value)=each($mylist)){
    if($value==$maxvalue)$maxindex=$key;
  }
  return array("m"=>$maxvalue,"i"=>$maxindex);
}

function theme_set() {
	$completeurl = "includes/settings.xml";
	$xml = simplexml_load_file($completeurl);
	$theme = $xml->theme;
	//echo $theme;
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"includes/" . $theme . ".css\"/>" ;
	}


?>
