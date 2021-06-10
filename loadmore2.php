<?php session_start(); $user_id=$_SESSION['userid']; ?>
<!DOCTYPE html>
<html>

<body>

<?php 
		include 'dbconfig.php';

		$commentNewCount = $_POST['commentNewCount'];
		$selcount = $_POST['selCount'];

		$index1 = intval($commentNewCount) + 2;
		$index2 = intval($commentNewCount) + 3;

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

		$rand_rec_fname="";
		$rand_rec_lname="";
		$rand_rec_race="";
		$rand_rec_gender="";

		$randkey_name=rand(0,1000);
		$rand_sql="select fname.first_name, lname.last_name, fname.race, fname.gender FROM fname INNER JOIN lname ON fname.race=lname.race WHERE ( CASE WHEN '$randkey_name' <= '605' THEN fname.race='White' WHEN '$randkey_name' > '605' && '$randkey_name' <= '740' THEN fname.race='Black' WHEN '$randkey_name' > '740' && '$randkey_name' <= '935' THEN fname.race='Asian' ELSE fname.race='Hispanic' END) ORDER BY RAND() LIMIT 1";
		$result_rand_rec=$conn->query($rand_sql);
		while($row = mysqli_fetch_array($result_rand_rec)){
			   $rand_rec_fname = $row['first_name'];
			   $rand_rec_lname = $row['last_name'];
			   $rand_rec_race = $row['race'];
			   $rand_rec_gender = $row['gender'];
		}
		$randarray_m=range(0,67);
		shuffle($randarray_m);
		echo "<div class='pure-u-1-2'><b>".$rand_rec_fname." ".$rand_rec_lname."</b> gave this film ".$column_rating_lm[$randarray_m[1]]."/10 <br>";
		echo "<br><img src=".$column_imageurl_lm[$randarray_m[1]].">";
		echo "\n<br>";
		echo "<button class='collapsible' onclick='count4()'>Read ".$rand_rec_fname." ".$rand_rec_lname."'s review</button>";
		echo "<div class='content'><br><i><a>".$column_review_lm[$randarray_m[1]]."</a></i></div>";
		echo "<br><div id='rec1'><button id='load-rec-button-4' class='button-success pure-button' onclick='loadRec4()' value='".$column_movietitle_lm[$randarray_m[1]]."'>Add ".$rand_rec_fname." ".$rand_rec_lname."'s suggestion to your list</button></div></div>";

		//new
			$x=$randarray_m[1]; 
			$column_movietitle_esc1=mysqli_real_escape_string($conn, $column_movietitle_lm[$x]);
			$column_review_esc1=mysqli_real_escape_string($conn, $column_review_lm[$x]);
			$column_first_esc1=mysqli_real_escape_string($conn, $rand_rec_fname);
			$column_last_esc1=mysqli_real_escape_string($conn, $rand_rec_lname);
			$column_race_esc1=mysqli_real_escape_string($conn, $rand_rec_race);
			$column_gender_esc1=mysqli_real_escape_string($conn, $rand_rec_gender);
			
			$insert_movie1="INSERT INTO output (user_id, order_no, movie_title, rating, review, clicked, timed, rec_first_name, rec_last_name, rec_race, rec_gender) VALUES ('$user_id', '$index1', '$column_movietitle_esc1', '$column_rating_lm[$x]', '$column_review_esc1', 0, 1, '$column_first_esc1', '$column_last_esc1', '$column_race_esc1', '$column_gender_esc1')";
			
			mysqli_query($conn,$insert_movie1);

		echo "\n<br><br>";
		$randkey_name=rand(0,1000);
		$rand_sql="select fname.first_name, lname.last_name, fname.race, fname.gender FROM fname INNER JOIN lname ON fname.race=lname.race WHERE ( CASE WHEN '$randkey_name' <= '605' THEN fname.race='White' WHEN '$randkey_name' > '605' && '$randkey_name' <= '740' THEN fname.race='Black' WHEN '$randkey_name' > '740' && '$randkey_name' <= '935' THEN fname.race='Asian' ELSE fname.race='Hispanic' END) ORDER BY RAND() LIMIT 1";
			$result_rand_rec=$conn->query($rand_sql);
			while($row = mysqli_fetch_array($result_rand_rec)){
			    $rand_rec_fname = $row['first_name'];
			    $rand_rec_lname = $row['last_name'];
			    $rand_rec_race = $row['race'];
			    $rand_rec_gender = $row['gender'];
			}
		echo "<div class='pure-u-1-2'><b>".$rand_rec_fname." ".$rand_rec_lname."</b> gave this film ".$column_rating_lm[$randarray_m[2]]."/10 <br>";
		echo "<br><img src=".$column_imageurl_lm[$randarray_m[2]].">";
		echo "\n<br>";
		echo "<button class='collapsible' onclick='count5()'>Read ".$rand_rec_fname." ".$rand_rec_lname."'s review</button>";
		echo "<div class='content'><br><i><a>".$column_review_lm[$randarray_m[2]]."</a></i></div>";
		echo "<br><div id='rec2'><button id='load-rec-button-5' class='button-success pure-button' onclick='loadRec5()' value='".$column_movietitle_lm[$randarray_m[2]]."'>Add ".$rand_rec_fname." ".$rand_rec_lname."'s suggestion to your list</button></div></div>";
		echo "\n<br><br>";

		//new
			$x=$randarray_m[2]; 
			$column_movietitle_esc1=mysqli_real_escape_string($conn, $column_movietitle_lm[$x]);
			$column_review_esc1=mysqli_real_escape_string($conn, $column_review_lm[$x]);
			$column_first_esc1=mysqli_real_escape_string($conn, $rand_rec_fname);
			$column_last_esc1=mysqli_real_escape_string($conn, $rand_rec_lname);
			$column_race_esc1=mysqli_real_escape_string($conn, $rand_rec_race);
			$column_gender_esc1=mysqli_real_escape_string($conn, $rand_rec_gender);
			
			$insert_movie1="INSERT INTO output (user_id, order_no, movie_title, rating, review, clicked, timed, rec_first_name, rec_last_name, rec_race, rec_gender) VALUES ('$user_id', '$index2', '$column_movietitle_esc1', '$column_rating_lm[$x]', '$column_review_esc1', 0, 1, '$column_first_esc1', '$column_last_esc1', '$column_race_esc1', '$column_gender_esc1')";
			
			mysqli_query($conn,$insert_movie1);


?>

<script>

	var coll = document.getElementsByClassName("collapsible");
	var i;
	var rmCount4=0;
	var rmCount5=0;
	var selFlag4=0;
	var selFlag5=0;

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
	    if(selFlag4%2==0)
	    {	
	    	if(selcount<2)
	    	{
		    	elem.innerHTML = "Added to your list";
			    selcount=selcount+1;
			    selFlag4=selFlag4+1;

			    let btnValue = elem.value;
		  
				// jQuery Ajax Post Request
				$.post('addtolist.php', {
				        btnValue: btnValue, rmCount: rmCount4
				    }, (response) => {
				        // response from PHP back-end
				        console.log(response);
				    });
			}
			else
	    	{
		    	alert("You've already selected 2 movies, uncheck a selection or click 'Done'."); return;
			}
		}
		else
		{
			elem.innerHTML = "Add to your list";
			selcount=selcount-1;
			selFlag4=selFlag4+1;

			let btnValue = elem.value;
		  
			// jQuery Ajax Post Request
			$.post('removefromlist.php', {
				    btnValue: btnValue, rmCount: rmCount4
				  }, (response) => {
				        // response from PHP back-end
				  console.log(response);
			});
		}
	}

	//OnClick 'Add to list' button class changer
	function loadRec5() {
		var elem = document.getElementById('load-rec-button-5');
	    if(selFlag5%2==0)
	    {	
	    	if(selcount<2)
	    	{
		    	elem.innerHTML = "Added to your list";
			    selcount=selcount+1;
			    selFlag5=selFlag5+1;

			    let btnValue = elem.value;
		  
				// jQuery Ajax Post Request
				$.post('addtolist.php', {
				        btnValue: btnValue, rmCount: rmCount5
				    }, (response) => {
				        // response from PHP back-end
				        console.log(response);
				    });
			}
			else
	    	{
		    	alert("You've already selected 2 movies, uncheck a selection or click 'Done'."); return;
			}
		}
		else
		{
			elem.innerHTML = "Add to your list";
			selcount=selcount-1;
			selFlag5=selFlag5+1;

			let btnValue = elem.value;
		  
			// jQuery Ajax Post Request
			$.post('removefromlist.php', {
				    btnValue: btnValue, rmCount: rmCount5
				  }, (response) => {
				        // response from PHP back-end
				  console.log(response);
			});
		}
	}

	function count4() {
		rmCount4=rmCount4+1;
	}

	function count5() {
		rmCount5=rmCount5+1;
	}


</script>

</body>
</html>
