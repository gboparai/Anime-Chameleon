<?php 
	require "scraper.php";
	require "config.php";
	
	set_time_limit (86400);
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	$animelist =getAnimeList();
	//loop episodes bottom to top
	$size = sizeof($animelist["animeList"]);
	for($i=0; $i<$size; $i++){
		//basic info
		$name = $animelist["animeList"][$i]["name"];
		$nameAnime = $name;
		$idAnime;
		$url = $animelist["animeList"][$i]["url"];
		
		//basic anime info
		$anime = getAnime($url);
		$image = $anime["image"];
		$year = $anime["year"];
		$status = $anime["status"];
		$description = $anime["description"];
		//execute insert and get id
		$sql = "INSERT INTO anime (name, url, image, year, status, description)
		VALUES ('".addslashes($name)."', '".addslashes($url)."', '".addslashes($image)."' , '".addslashes($year)."', '".addslashes($status)."' ,'".addslashes($description)."')";

		if ($conn->query($sql) === TRUE) {
		    $idAnime = $conn->insert_id;
		    echo "New record created successfully. Last inserted ID is: " . $idAnime."<br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


		$numGenre = sizeof($anime["genre"]);
		for($j=0; $j<$numGenre; $j++){
			$genre = $anime["genre"][$j];
			//execute insert
			$sql = "INSERT INTO genre (idAnime, nameAnime, genre)
			VALUES ('".$idAnime."', '".addslashes($nameAnime)."', '".addslashes($genre)."' )";
			if ($conn->query($sql) === TRUE) {
			    echo "New genre record created successfully <br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
		$numEps= sizeof($anime["episodes"]);
		for($j=0; $j<$numEps; $j++){
			$episode =$anime["episodes"][$j];
			$episodeInfo =  getEpisode($episode["url"],$episode["name"]);
			$title = $episodeInfo["title"];
			$number = $episodeInfo["number"];
			$video = $episodeInfo["videoURL"];
			$image = $episodeInfo["imageURL"];
			$urlEps = $episodeInfo["url"];
			//execute insert
			$sql = "INSERT INTO episode (idAnime, nameAnime, number, title, video, image, url)
		VALUES ('".$idAnime."', '".addslashes($nameAnime)."', '".addslashes($number)."' , '".addslashes($title)."', '".addslashes($video)."', '".addslashes($image)."', '".addslashes($urlEps)."')";
			if ($conn->query($sql) === TRUE) {
			    echo "New episode record created successfully <br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		
	}
	$conn->close();
	//$newInformation = parseHomePage();

?>