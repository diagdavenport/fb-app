<?php session_start(); $user_id=$_SESSION['userid']; if(isset($_SESSION['userVisited'])){
	if($_SESSION['userVisited']=="1")
    {
        header('Location: exit.html');
        exit;
    }
   }
   //Check user cookie on whether they've completed the survey already
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css" />
	    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

        background-color: #dfe6e9;

        .dropbtn {
          background-color: #3498DB;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
          background-color: #2980B9;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          overflow: auto;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}

        .is-right{
		float:right;
		text-align:right;
		right:30px;
		position: fixed;
		}

      </style>
      <style scoped="">
        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65);
            /* this is a green */
        }

        .button-secondary {
            background: rgb(66, 184, 221);
            /* this is a light blue */
        }

        .button-xlarge {
            font-size: 125%;
        }

        .collapsible {
		  background: rgb(66, 184, 221);
		  color: white;
		  cursor: pointer;
		  border: none;
		  text-align: center;
		  outline: none;
          border-radius: 4px;
          text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
		}

		.active, .collapsible:hover {
		  background-color: #555;
		}

		.content {
		  padding: 0 18px;
		  max-height: 0;
		  overflow: hidden;
		  transition: max-height 0.2s ease-out;
		  background-color: #f1f1f1;
		}
    </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="js/timeme.js"></script>
	<script type="text/javascript">
		TimeMe.initialize({
		    currentPageName: "home-page", // page name
		    idleTimeoutInSeconds: 15 // time before user considered idle
		});
	</script>
	
</head>

<body>

	
		<?php

		    echo "<div class='content-head is-right'> <button class='button-success button-xlarge pure-button' id='myCheck' onclick='done()'><b>DONE</b></button></div>";
		    echo "<div class='content-head is-center'><h1>WELCOME!</h1></div>";
		    
		    //Include database connection
			include 'dbconfig.php';

			#Update Test Type in Users Table
			$update_user_test_time="UPDATE users SET test_timed='0' WHERE user_id='$user_id'";
			$result_user_tt=$conn->query($update_user_test_time);

			$sql_first = "SELECT first_name FROM fname";
			$sql_race = "SELECT race FROM fname";
			$sql_gender = "SELECT gender FROM fname";
			$sql_last = "SELECT last_name FROM lname";
			$sql_movietitle = "SELECT title FROM movies_1";
			$sql_rating = "SELECT rating FROM movies_1";
			$sql_review = "SELECT review FROM movies_1";
			$sql_imageurl = "SELECT image_link FROM movies_1";
			$result_first=$conn->query($sql_first);
			$result_race=$conn->query($sql_race);
			$result_gender=$conn->query($sql_gender);
			$result_last=$conn->query($sql_last);
			$result_movietitle=$conn->query($sql_movietitle);
			$result_rating=$conn->query($sql_rating);
			$result_review=$conn->query($sql_review);
			$result_imageurl=$conn->query($sql_imageurl);

			$column_first = array();
			$column_race = array();
			$column_gender = array();
			$column_last = array();
			$column_movietitle = array();
			$column_rating = array();
			$column_review = array();
			$column_imageurl = array();

			while($row = mysqli_fetch_array($result_first)){
			    $column_first[] = $row['first_name'];
			}

			while($row = mysqli_fetch_array($result_race)){
			    $column_race[] = $row['race'];
			}

			while($row = mysqli_fetch_array($result_gender)){
			    $column_gender[] = $row['gender'];
			}

			while($row = mysqli_fetch_array($result_last)){
			    $column_last[] = $row['last_name'];
			}

			while($row = mysqli_fetch_array($result_movietitle)){
			    $column_movietitle[] = $row['title'];
			}

			while($row = mysqli_fetch_array($result_rating)){
			    $column_rating[] = $row['rating'];
			}

			while($row = mysqli_fetch_array($result_review)){
			    $column_review[] = $row['review'];
			}

			while($row = mysqli_fetch_array($result_imageurl)){
			    $column_imageurl[] = $row['image_link'];
			}


			/* Printing an array
			echo '<pre>'; print_r($column); echo '</pre>'; */
			echo "\n\n<br /><br /><div id='main' class='pure-g' style='text-align: center;'>";

			//New

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

			//$randkey_f=rand(0,80);
			//$randkey_l=rand(0,53);
			$randarray_m=range(0,67);
			shuffle($randarray_m);
			
			echo "<br /><br /><div class='pure-u-1-3' style='padding-top: 25px;'><b>".$rand_rec_fname." ".$rand_rec_lname."</b> gave this film ".$column_rating[$randarray_m[1]]."/10 <br>";
			echo "<br><img src=".$column_imageurl[$randarray_m[1]].">";
			echo "\n<br>";
			echo "<button class='collapsible' onclick='count1()'>Read ".$rand_rec_fname." ".$rand_rec_lname."'s review</button>";
			echo "<div class='content'><br><i><a>".$column_review[$randarray_m[1]]."></a></i></div>";
			echo "<br><div id='rec1'><button id='load-rec-button-1' name='".$rand_rec_fname." ".$rand_rec_lname."' class='button-success pure-button' onclick='loadRec1()' value='".$column_movietitle[$randarray_m[1]]."'>Add ".$rand_rec_fname." ".$rand_rec_lname."'s suggestion to your list</button></div></div>";

			//new
			$x=$randarray_m[1]; 
			$column_movietitle_esc1=mysqli_real_escape_string($conn, $column_movietitle[$x]);
			$column_review_esc1=mysqli_real_escape_string($conn, $column_review[$x]);
			$column_first_esc1=mysqli_real_escape_string($conn, $rand_rec_fname);
			$column_last_esc1=mysqli_real_escape_string($conn, $rand_rec_lname);
			$column_race_esc1=mysqli_real_escape_string($conn, $rand_rec_race);
			$column_gender_esc1=mysqli_real_escape_string($conn, $rand_rec_gender);
			
			$insert_movie1="INSERT INTO output (user_id, order_no, movie_title, rating, review, clicked, timed, rec_first_name, rec_last_name, rec_race, rec_gender) VALUES ('$user_id', '1', '$column_movietitle_esc1', '$column_rating[$x]', '$column_review_esc1', 0, 0, '$column_first_esc1', '$column_last_esc1', '$column_race_esc1', '$column_gender_esc1')";
			
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

			//$randkey_f=rand(0,80);
			//$randkey_l=rand(0,53);
			
			echo "<br /><br /><div class='pure-u-1-3' style='padding-top: 25px;'><b>".$rand_rec_fname." ".$rand_rec_lname."</b> gave this film ".$column_rating[$randarray_m[2]]."/10 <br>";
			echo "<br><img src=".$column_imageurl[$randarray_m[2]].">";
			echo "\n<br>";
			echo "<button class='collapsible' onclick='count2()'>Read ".$rand_rec_fname." ".$rand_rec_lname."'s review</button>";
			echo "<div class='content'><br><i><a>".$column_review[$randarray_m[2]]."></a></i></div>";
			echo "<br><div id='rec2'><button id='load-rec-button-2' name='".$rand_rec_fname." ".$rand_rec_lname."' class='button-success pure-button' onclick='loadRec2()' value='".$column_movietitle[$randarray_m[2]]."'>Add ".$rand_rec_fname." ".$rand_rec_lname."'s suggestion to your list</button></div></div>";

			//new
			$x=$randarray_m[2]; 
			$column_movietitle_esc2=mysqli_real_escape_string($conn, $column_movietitle[$x]);
			$column_review_esc2=mysqli_real_escape_string($conn, $column_review[$x]);
			$column_first_esc2=mysqli_real_escape_string($conn, $rand_rec_fname);
			$column_last_esc2=mysqli_real_escape_string($conn, $rand_rec_lname);
			$column_race_esc2=mysqli_real_escape_string($conn, $rand_rec_race);
			$column_gender_esc2=mysqli_real_escape_string($conn, $rand_rec_gender);
			
			$insert_movie2="INSERT INTO output (user_id, order_no, movie_title, rating, review, clicked, timed, rec_first_name, rec_last_name, rec_race, rec_gender) VALUES ('$user_id', '2', '$column_movietitle_esc2', '$column_rating[$x]', '$column_review_esc2', 0, 0, '$column_first_esc2', '$column_last_esc2', '$column_race_esc2', '$column_gender_esc2')";
			
			mysqli_query($conn,$insert_movie2);
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

			//$randkey_f=rand(0,80);
			//$randkey_l=rand(0,53);
			
			echo "<br /><br /><div class='pure-u-1-3' style='padding-top: 25px;'><b>".$rand_rec_fname." ".$rand_rec_lname."</b> gave this film ".$column_rating[$randarray_m[3]]."/10 <br>";
			echo "<br><img src=".$column_imageurl[$randarray_m[3]].">";
			echo "\n<br>";
			echo "<button class='collapsible' onclick='count3()'>Read ".$rand_rec_fname." ".$rand_rec_lname."'s review</button>";
			echo "<div class='content'><br><i><a>".$column_review[$randarray_m[3]]."></a></i></div>";
			echo "<br><div id='rec3'><button id='load-rec-button-3' class='button-success pure-button' onclick='loadRec3()' name='".$rand_rec_fname." ".$rand_rec_lname."' value='".$column_movietitle[$randarray_m[3]]."'>Add ".$rand_rec_fname." ".$rand_rec_lname."'s suggestion to your list</button></div></div>";

			//new
			$x=$randarray_m[3]; 
			$column_movietitle_esc3=mysqli_real_escape_string($conn, $column_movietitle[$x]);
			$column_review_esc3=mysqli_real_escape_string($conn, $column_review[$x]);
			$column_first_esc3=mysqli_real_escape_string($conn, $rand_rec_fname);
			$column_last_esc3=mysqli_real_escape_string($conn, $rand_rec_lname);
			$column_race_esc3=mysqli_real_escape_string($conn, $rand_rec_race);
			$column_gender_esc3=mysqli_real_escape_string($conn, $rand_rec_gender);
			
			$insert_movie3="INSERT INTO output (user_id, order_no, movie_title, rating, review, clicked, timed, rec_first_name, rec_last_name, rec_race, rec_gender) VALUES ('$user_id', '3', '$column_movietitle_esc3', '$column_rating[$x]', '$column_review_esc3', 0, 0, '$column_first_esc3', '$column_last_esc3', '$column_race_esc3', '$column_gender_esc3')";
			
			mysqli_query($conn,$insert_movie3);

			echo "\n<br><br>";

			$conn->close();
		?>
	</div>
	<br><br><div id="lm" class="pure-g" style="text-align: center;"><br /></div>	
	
	<div id="demo" class="content-head is-center">
		<button id="load-more-button" class="button-xlarge pure-button" onclick="loadMore()">Load More</button>
	</div>
	<br>
	<!--<div class='content-head is-center'> <button class='button-success pure-button' id='myCheck' onclick='done()'>Done</button></div>-->

	<input type="hidden" id="userid" name="userid">		    

<script>

	var coll = document.getElementsByClassName("collapsible");
	var rmCount1=0;
	var rmCount2=0;
	var rmCount3=0;
	var selFlag1=0;
	var selFlag2=0;
	var selFlag3=0;
	var i;
	var id=0;
	var selcount=0;
	var commentCount=0;

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
	function loadRec1() {
		var elem = document.getElementById('load-rec-button-1');
		var elemName = elem.name;
		if(selFlag1%2==0)
	    {	
	    	if(selcount<2)
	    	{
		    	elem.innerHTML = "Added to your list";
			    selcount=selcount+1;
			    selFlag1=selFlag1+1;

			    let btnValue = elem.value;
		  
				// jQuery Ajax Post Request
				$.post('addtolist.php', {
				        btnValue: btnValue, rmCount: rmCount1, elemName: elemName
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
			elem.innerHTML = "Add "+elemName+"'s suggestion to your list";
			selcount=selcount-1;
			selFlag1=selFlag1+1;

			let btnValue = elem.value;
		  
			// jQuery Ajax Post Request
			$.post('removefromlist.php', {
				    btnValue: btnValue, rmCount: rmCount1, elemName: elemName
				  }, (response) => {
				        // response from PHP back-end
				  console.log(response);
			});
		}
	}

	//OnClick 'Add to list' button class changer
	function loadRec2() {
		var elem = document.getElementById('load-rec-button-2');
		var elemName = elem.name;
		if(selFlag2%2==0)
	    {	
	    	if(selcount<2)
	    	{
		    	elem.innerHTML = "Added to your list";
			    selcount=selcount+1;
			    selFlag2=selFlag2+1;

			    let btnValue = elem.value;
		  
				// jQuery Ajax Post Request
				$.post('addtolist.php', {
				        btnValue: btnValue, rmCount: rmCount2, elemName: elemName 
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
			elem.innerHTML = "Add "+elemName+"'s suggestion to your list";
			selcount=selcount-1;
			selFlag2=selFlag2+1;

			let btnValue = elem.value;
		  
			// jQuery Ajax Post Request
			$.post('removefromlist.php', {
				    btnValue: btnValue, rmCount: rmCount2, elemN: elemName 
				  }, (response) => {
				        // response from PHP back-end
				  console.log(response);
			});
		}
	}
		
	//OnClick 'Add to list' button class changer
	function loadRec3() {
		var elem = document.getElementById('load-rec-button-3');
		var elemName = elem.name;
		if(selFlag3%2==0)
	    {	
	    	if(selcount<2)
	    	{
		    	elem.innerHTML = "Added to your list";
			    selcount=selcount+1;
			    selFlag3=selFlag3+1;

			    let btnValue = elem.value;

				// jQuery Ajax Post Request
				$.post('addtolist.php', {
				        btnValue: btnValue, rmCount: rmCount3, elemName: elemName
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
			elem.innerHTML = "Add "+elemName+"'s suggestion to your list";
			selcount=selcount-1;
			selFlag3=selFlag3+1;

			let btnValue = elem.value;
		  
			// jQuery Ajax Post Request
			$.post('removefromlist.php', {
				    btnValue: btnValue, rmCount: rmCount3, elemName: elemName
				  }, (response) => {
				        // response from PHP back-end
				  console.log(response);
			});
		}
			//elem.innerHTML = "<b>Selected 3 movies, click 'Done' below to proceed</b>";

		
	}

	function loadMore() {

		commentCount=commentCount+2;
    	$("#lm").load("loadmore.php", {
    				commentNewCount: commentCount, selCount: selcount
    			});
	}

	function count1() {
		rmCount1=rmCount1+1;
	}

	function count2() {
		rmCount2=rmCount2+1;
	}

	function count3() {
		rmCount3=rmCount3+1;
	}

	function done() {

		if(selcount<2)
	    {	
	    	alert("You've not selected 2 movies yet. Please select atleast 2 movies & then click 'Done'."); 
	    	return;
		}
		else    
			window.location.assign("feedback.php");
	}

</script>
</body>
</html>