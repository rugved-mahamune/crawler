<?php

	$url=$_POST['url'];
	recurrsive($url);

	function recurrsive($http_url)
	 {
	   $eurl=str_replace("https:","http:","$http_url");
		
	   $page = new DOMDocument();
	   $url=html_entity_decode($eurl);
	   @$page->loadHTMLFile($url);
	   $pagestring=$page->saveHTML();
   	   $content2 = getTextBetweenTags($pagestring,'title');
		echo $url;
echo "$content2<br/>";
    	 foreach ($page->getElementsByTagName('a') as $links)  {    
		$original_url = $links->getAttribute('href');
		//echo "$original_url";
 		//echo "$content2<br/>";
		recurrsive($original_url);
	   }
	  

	 }
	
	function getTextBetweenTags($string, $tagname)  // this is function to get text between tags!!
 	 {
	    $pattern = "/<$tagname>((.|\n)*?)<\/$tagname>/";
	  // $pattern = "/<$tagname>(.*?)<\/$tagname>/";
	   preg_match($pattern, $string, $matches);
	   return $matches[1];
 
 	 }

?>
