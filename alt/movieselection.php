
<!DOCTYPE html>
<html>

<body>

<?php 
		$servername = "localhost";
		$username = "root";
		$password = "Root@31";
		$dbname = "boothcaai1";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$commentNewCount = $_POST['commentNewCount'];

		$sql_first_lm = "SELECT first_name FROM fname";
		$sql_race_lm = "SELECT race FROM fname";
		$sql_gender_lm = "SELECT gender FROM fname";
		$sql_last_lm = "SELECT last_name FROM lname";
		$sql_movietitle_lm = "SELECT title FROM movies_1";
		$sql_rating_lm = "SELECT rating FROM movies_1";
		$sql_review_lm = "SELECT review FROM movies_1";
		$sql_imageurl_lm = "SELECT image_link FROM movies_1";
		$result_first_lm=$conn->query($sql_first_lm);
		$result_race_lm=$conn->query($sql_race_lm);
		$result_gender_lm=$conn->query($sql_gender_lm);
		$result_last_lm=$conn->query($sql_last_lm);
		$result_movietitle_lm=$conn->query($sql_movietitle_lm);
		$result_rating_lm=$conn->query($sql_rating_lm);
		$result_review_lm=$conn->query($sql_review_lm);
		$result_imageurl_lm=$conn->query($sql_imageurl_lm);

		$column_first_lm = array();
		$column_race_lm = array();
		$column_gender_lm = array();
		$column_last_lm = array();
		$column_movietitle_lm = array();
		$column_rating_lm = array();
		$column_review_lm = array();
		$column_imageurl_lm = array();

		while($row = mysqli_fetch_array($result_first_lm)){
		    $column_first_lm[] = $row['first_name'];
		}

		while($row = mysqli_fetch_array($result_race_lm)){
		    $column_race_lm[] = $row['race'];
		}

		while($row = mysqli_fetch_array($result_gender_lm)){
		    $column_gender_lm[] = $row['gender'];
		}

		while($row = mysqli_fetch_array($result_last_lm)){
		    $column_last_lm[] = $row['last_name'];
		}

		while($row = mysqli_fetch_array($result_movietitle_lm)){
		    $column_movietitle_lm[] = $row['title'];
		}

		while($row = mysqli_fetch_array($result_rating_lm)){
		    $column_rating_lm[] = $row['rating'];
		}

		while($row = mysqli_fetch_array($result_review_lm)){
		    $column_review_lm[] = $row['review'];
		}

		while($row = mysqli_fetch_array($result_imageurl_lm)){
		    $column_imageurl_lm[] = $row['image_link'];
		}


		/* Printing an array
		echo '<pre>'; print_r($column); echo '</pre>'; */

		$randkey_f=rand(0,67);
		$randkey_l=rand(0,24);
		$randarray_m=range(0,67);
		shuffle($randarray_m);
		echo "<div class='pure-u-1-2'><b>".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."</b> gave this film ".$column_rating_lm[$randarray_m[1]]."/10 <br>";
		echo "<br><img src=".$column_imageurl_lm[$randarray_m[1]].">";
		echo "\n<br>";
		echo "<button class='collapsible'>Read ".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."'s review</button>";
		echo "<div class='content'><br><i><a>".$column_review_lm[$randarray_m[1]]."</a></i></div>";
		echo "<br><div id='rec1'><button id='load-rec-button-4' class='button-success pure-button' onclick='loadRec4()'>Add ".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."'s suggestion to your list</button></div></div>";

		echo "\n<br><br>";
		$randkey_f=rand(0,67);
		$randkey_l=rand(0,24);
		//$randkey_m=rand(0,9);
		echo "<div class='pure-u-1-2'><b>".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."</b> gave this film ".$column_rating_lm[$randarray_m[2]]."/10 <br>";
		echo "<br><img src=".$column_imageurl_lm[$randarray_m[2]].">";
		echo "\n<br>";
		echo "<button class='collapsible'>Read ".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."'s review</button>";
		echo "<div class='content'><br><i><a>".$column_review_lm[$randarray_m[2]]."</a></i></div>";
		echo "<br><div id='rec2'><button id='load-rec-button-5' class='button-success pure-button' onclick='loadRec5()'>Add ".$column_first_lm[$randkey_f]." ".$column_last_lm[$randkey_l]."'s suggestion to your list</button></div></div>";
		echo "\n<br><br>";
?>

<script>

	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content = this.nextElementSibling;
	    if (content.style.maxHeight){
	      content.style.maxHeight = null;
	    } else {
	      content.style.maxHeight = content.scrollHeight + "px";
	    } 
	  });
	}

	//OnClick 'Add to list' button class changer
	function loadRec4() {
		var elem = document.getElementById('load-rec-button-4');
	    elem.innerHTML = "Added to your list";
	}

	//OnClick 'Add to list' button class changer
	function loadRec5() {
		var elem = document.getElementById('load-rec-button-5');
	    elem.innerHTML = "Added to your list";
	}


</script>

<!--<html>
<body>
	<p><b>Joy M</b> gave this film 4/10</p>
	
	<br><img src="https://m.media-amazon.com/images/M/MV5BMTgyNjU5NzQxM15BMl5BanBnXkFtZTcwMDgwMjYzMQ@@._V1_UY268_CR4,0,182,268_AL_.jpg"><br>
	
	<div id='rev2'><button id='load-rev-button-2' class='button-secondary pure-button' onclick='loadRev2()'>Read Joy M's review</button></div>
			<br><i><a>This movie had an interesting cast, it mat not have had an a list cast but the actors that were in this film did a good job. Im glad we have b grade movies like this one, the story is basic the actors are basic and so is the way they execute it, you don't need a million dollar budget to make a film just a mix of b list ordinary actors and a basic plot. I like the way they had the street to themselves and that there was no one else around and also what i though was interesting is that they didn't close down a cafÃ© to set there gear and that they did it all from a police station. Arnold vosloo and Michael madsen did a great job at portraying there roles in the hostage situation. This was a great film and i hope to see more like it in the near future.</a></i>
			<br><div id='rec2'><button id='load-rec-button-2' class='button-success pure-button' onclick='loadRec2()'>Add Joy M's suggestion to your list</button></div>
			<br><br>



	<p><b>Carrie J</b> gave this film 5.1/10</p>
	<br><img src="https://m.media-amazon.com/images/M/MV5BMzhkYTEyYzItMWU5Ny00NjhiLWFiNmEtM2QwOWVlY2UyZThmXkEyXkFqcGdeQXVyMTA0MjU0Ng@@._V1_UY268_CR11,0,182,268_AL_.jpg
	"><br>
	<div id='rev2'><button id='load-rev-button-2' class='button-secondary pure-button' onclick='loadRev2()'>Read Carrie J's review</button></div>
			<br><i><a>Actually, Goldie Hawn is from Washington (Takoma Park, Maryland), but I digress. This is sort of a Mr. Smith goes to Washington type of movie, with some variations but the same premise. I taped this movie off of cable years ago because I had a huge crush on Goldie Hawn. The story is interesting, but it's highly unlikely that some cocktail waitress will get an important job in the government just because she saved some big shot's life. It made me laugh and made me mad at the same time. It made me laugh because some of the situations she found herself in were so ridiculous, I had to laugh. (POSSIBLE SPOILER AHEAD). It made me mad to think that our government would set up an average citizen in the manner she was set up. And the speech she made at the end...beautiful. Too bad not many people have guts like that in real life.</a></i>
			<br><div id='rec2'><button id='load-rec-button-2' class='button-success pure-button' onclick='loadRec2()'>Add Carrie J's suggestion to your list</button></div>
			<br><br>

	<div id="demo">
	<button id="load-more-button" onclick="loadDoc()">Load More</button>
	</div>-->

</body>
</html>
