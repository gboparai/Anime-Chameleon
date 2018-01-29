<?php 
	
	function getAnimeList(){
		$page = file_get_contents('https://dubbedanime.io/anime-list');
		$doc = new DOMDocument();
		@$doc->loadHTML($page);
		$nodes = $doc->getElementById ("anime-series")->getElementsByTagName('li');
		 // this value will also change
		$animelist = array();
		foreach ($nodes as $node)
		{
			preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $doc->saveHTML($node), $result);
			$anime = array();
			$anime["name"] =trim($node->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
			if (!empty($result)) {
			    # Found a link.
			    $anime["url"] = $result['href'][0];

			}
			

			$animelist["animeList"][] = $anime;

		}
		return $animelist;
	}
	function getAnime($url){
		$page =  file_get_contents($url);
		$doc = new DOMDocument();
		@$doc->loadHTML($page);
		if($page){
			$nodes = $doc->getElementById ("episodes-list")->getElementsByTagName('li');
			$episodelist = array();
			$anime = array();

			$info = $doc->getElementById ("episodes-list");
			$info = $info->parentNode;
			$strippedInfo  = preg_replace ("/<b>(.*?)<\/b>/i", "", $doc->saveHTML($info));
			$strippedInfo  = preg_replace ("/<strong>(.*?)<\/strong>/i", "",$strippedInfo);
			$strippedInfo  = preg_replace ("/<h4>(.*?)<\/h4>/i", "",$strippedInfo);
			$myArray = preg_split('/<br[^>]*>/i',$strippedInfo);
			$myArray[7] = preg_replace ("/<(.*?)>(.*?)<\/(.*?)>/i", "",$myArray[7]);
			$myArray[7] = strip_tags($myArray[7]);
			preg_match_all('/<img[^>]+src=([\'"])(?<src>.+?)\1[^>]*>/i', $myArray[0], $resultImage);
			$title = $myArray[1];
			$year = $myArray[2];
			$status = $myArray[3];
			$rating = $myArray[5];
			$description = $myArray[7];
			$genre =  preg_split('/,/i',$myArray[4]);

			
			foreach ($nodes as $node){
				preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $doc->saveHTML($node), $result);
				$episode = array();
				$episode["name"] =trim($node->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
				if (!empty($result)) {
				    # Found a link.
				    $episode["url"] = $result['href'][0];

				}
				
				$episodelist[] = $episode;
			}
			$anime["title"]= $title;
			if (!empty($resultImage)) {
			    # Found a link.
			    $anime["image"] = $resultImage['src'][0];
			}
			$anime["description"]=$description;
			$anime["year"]= $year;
			$anime["status"]= $status;
			$anime["genre"]= $genre;
			$anime["episodes"]=$episodelist;
			return $anime;
		}
		else{
			return false;
		}
	}
	function getEpisode($url, $title){
		$page =  file_get_contents($url);
		$doc = new DOMDocument();
		@$doc->loadHTML($page);
		$episode = array();
		$episode["url"]= $url;
		$episode["title"] = $title;
		$videoElement = $doc->getElementById ("video");
		$titleArr =  preg_split('/ /i',$title);
		$episode["number"] =end($titleArr);
		preg_match_all('/<iframe[^>]+src=([\'"])(?<src>.+?)\1[^>]*>/i', $doc->saveHTML($videoElement), $resultVideo);
		if (!empty($resultVideo)) {
		    # Found a link.
		    $episode["videoURL"] = $resultVideo['src'][0];
		}
		foreach ($doc->getElementsByTagName('a') as $element)
		{
			if ($element->getAttribute('href') == $url)
			{
				$imgElement= $element->getElementsByTagName('img');
				preg_match_all('/<img[^>]+src=([\'"])(?<src>.+?)\1[^>]*>/i', $doc->saveHTML($imgElement[0]), $resultImage);
				if (!empty($resultImage)) {
				    # Found a link.
				    $episode["imageURL"] = $resultImage['src'][0];
				}
			}
		}
		return($episode);

	}
	function parseHomePage(){
		$page =  file_get_contents("https://dubbedanime.io/");
		$doc = new DOMDocument();
		@$doc->loadHTML($page);
		$newEpisodes = array();
		foreach ($doc->getElementsByTagName("div") as $element) {
			if ($element->getAttribute('class') == "thumbnail"){
				preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $doc->saveHTML($element), $result);
				if (!empty($result)) {
				    # Found a link.
				    $episode=array();
				    $episode["urlEpisode"] = $result['href'][0];
				    $seperated = explode('-', $episode["urlEpisode"]);
				    $seperatedReverse = array_reverse($seperated);
					foreach ( $seperatedReverse as $key => $value) {
						# code...
						if($value == "episode"){
							unset($seperatedReverse[$key]);
							break;
						}
						else{
							unset($seperatedReverse[$key]);

						}
					}
					$seperated =  array_reverse($seperatedReverse);
					$seperated[]= "english";
					$seperated[]= "dubbed";
					$newString = implode("-", $seperated);
					$newURLSeperated = explode("/", $newString);
					$slug = end($newURLSeperated);
					$newURL = 'https://dubbedanime.io/anime/';
					$newURLSlug= $newURL."".$slug;
				    $episode["urlAnime"]= $newURLSlug;

				    $newEpisodes[]=$episode;
				}
			}
		}
		return $newEpisodes;
	}

	/***
	$animelist =getAnimeList();
	//loop episodes bottom to top
	$anime = getAnime($animelist["animeList"][0]["url"]);
	//video url is iframe
	$episode = getEpisode($anime["episodes"][0]["url"], $anime["episodes"][0]["name"]);

	$newInformation = parseHomePage();
	***/
?>