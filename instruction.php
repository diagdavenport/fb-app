<?php 
if(isset($_SESSION['userVisited']))
  {  if($_SESSION['userVisited']=="1")
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
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<title>Instructions</title>
<body>

	<?php
			$racearray='';
			$race=$_POST["race"]; 
			foreach ($race as $a){$racearray="$a".", "."$racearray";}
			$racearray=substr($racearray, 0, -2);
			
			$gender=$_POST["gender"];
			$age=$_POST["age"];
			$education=$_POST["education"];
			$frequency=$_POST["frequency"];
			$genre=$_POST["genre"];
			$access=$_POST["access"];
			$user_id=$_POST["userid"];  

			session_start();
			$_SESSION['userid'] = $_POST["userid"];

			if($access=='0') {header("Location: exit.html"); die(); }
		    
		    //echo "Post ".$race.','.$gender.','. $age.','.$education.','.$movies.','.$genre.','.$access;

			include 'dbconfig.php';

			//$column_gender_esc1=mysqli_real_escape_string($conn, $column_gender[$randkey_f]);
		
			$insert_user="INSERT INTO users (user_id, user_race, user_gender, user_age, user_education, user_frequency, user_genre) VALUES ('$user_id', '$racearray', '$gender', '$age', '$education', '$frequency', '$genre')";
			
			//mysqli_query($conn,$insert_user);
			
			if(mysqli_query($conn,$insert_user)){} 
			else{echo "ERROR: Could not able to execute $insert_user. " . mysqli_error($conn);}


	?>	
	
	<!--old-->
    <h2 class="content-head is-center">Instructions</h2>
    <div style="padding-left: 12px;"><?php $get_instructions="SELECT instructions FROM dynamic_content";
    	$instructions=mysqli_query($conn,$get_instructions);
		while($row = mysqli_fetch_array($instructions)){
			    echo $row['instructions'];
		} ?>
	
	</div>
	<div>
			    <style scoped="">
			        .button-success,
			        .button-error {
			            color: white;
			            border-radius: 4px;
			            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			        }

			        .button-success {
			            background: rgb(28, 184, 65);
			            /* this is a green */
			        }

			        .button-error {
			            background: rgb(202, 60, 60);
			            /* this is a maroon */
			        }
			     
			    </style>
			    <br> <div style="padding-left: 12px;"> <button class="button-success pure-button" id="myCheck" onclick='window.location.assign(choose())'>Proceed</button>
			    <br />
			    </div>
			    
	</div>

</body>

	<script>
		
		
		function choose() {
		  var choices = [ "preconnect.php", "preconnect2.php"];
		  var index = Math.floor(Math.random() * choices.length);
		  return choices[index];
		}

	</script>

</html>
