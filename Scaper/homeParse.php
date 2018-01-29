<?php 
	require "scraper.php";
	require "config.php";


	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$items = parseHomePage();
	
	$size = sizeof($items);
	for($i=0; $i<$size; $i++){
		$item = $items[$i];
		$sql = "SELECT * FROM anime WHERE url='".addslashes($item["urlAnime"])."'";
		$result = $conn->query($sql);
		echo json_encode($item);
		if (!$result || !($result->num_rows > 0)) {
			$url =$item["urlAnime"];
			$anime = getAnime($item["urlAnime"]);
			if($anime){
				$name = $anime["title"];
				$nameAnime =$name;
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

		} 
		else{
			$sql2 = "SELECT * FROM episode WHERE url='".$item["urlEpisode"]."'";
			$result2 = $conn->query($sql2);
			if (!$result2 || !($result2->num_rows > 0)) {
				$row = $result->fetch_assoc();
				$episodeInfo =  getEpisode($item["urlEpisode"],$row["name"]);
				$title = $episodeInfo["title"];
				$number = $episodeInfo["number"];
				$video = $episodeInfo["videoURL"];
				$image = $episodeInfo["imageURL"];
				$urlEps = $episodeInfo["url"];
				//execute insert
				$sql = "INSERT INTO episode (idAnime, nameAnime, number, title, video, image, url)
				VALUES ('".addslashes($row["id"])."', '".addslashes($row["name"])."', '".addslashes($number)."' , '".addslashes($title)."', '".addslashes($video)."', '".addslashes($image)."', '".addslashes($urlEps)."')";
			
				if ($conn->query($sql) === TRUE) {
				    echo "New episode record created successfully <br>";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
			} 
		}
		
	}	
	$conn->close();
?>