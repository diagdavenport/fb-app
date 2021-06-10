<?php session_start(); $user_id=$_SESSION['userid']; ?>
<?php if(isset($_SESSION['userVisited']))
	  {  if($_SESSION['userVisited']=="1")
	    {
	        header('Location: exit.html');
	        exit;
	    }
	   }
	//$user_id=$_SESSION['userid'];
	$_SESSION['userVisited'] = 1;

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
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<title>Instructions</title>
<body>

	<?php

			include 'dbconfig.php';

			if(isset($_POST['rate']))
		    {
		         
				$rate=$_POST['rate'];
				$satisfied=$_POST["satisfied"];
				$likely=$_POST["likely"];
				$rely=$_POST["rely"];
				$think=$_POST["think"];
				$study=$_POST["study"];

				$feedback_update="UPDATE users SET feedback_rate='$rate', feedback_satisfied='$satisfied', feedback_likely='$likely', feedback_relay='$rely', feedback_think='$think', feedback_study='$study' WHERE user_id='$user_id'";
			
			//mysqli_query($conn,$update_clicked);
			$sel_movie="";

				if(mysqli_query($conn,$feedback_update)){
						    //echo "Updated  $user_id successfully using $feedback_update.";
						} else{
						    echo "ERROR: Not able to execute $feedback_update. " . mysqli_error($conn);
						}
			 
			         // Sending Response
			        //echo "Success";
			    }
			
			//if($access=='0') {header("Location: exit.html"); die(); }
			
			else
				echo "User Feedback not received";
			
		    $fetch_movie="SELECT movies_1.prime_view_link FROM movies_1 INNER JOIN output WHERE output.user_id='$user_id' AND output.clicked='1' ORDER BY RAND() LIMIT 1";
		    $movie_fetch=mysqli_query($conn,$fetch_movie);
		    while($row = mysqli_fetch_array($movie_fetch)){
			    $sel_movie=$row['prime_view_link'];
			}

	?>	
    <h2 class="content-head is-center">Thank you!</h2>
    <h4 class="content-head is-center" style="padding-left: 12px;">Thank you for completing the task!<br /><br />Here is your completion code: <b>'
    	<?php $get_code="SELECT thankyou_code FROM dynamic_content";
    	$code=mysqli_query($conn,$get_code);
		while($row = mysqli_fetch_array($code)){
			    echo $row['thankyou_code'];
		}
		?>'
    </b><br /><br />
    <!--<a id='ml' value='<?php echo $sel_movie; ?>' href='<?php echo $sel_movie; ?>' target='_blank'>Here is the link for your movie</a> <br /><br />-->
    <button id='ml' value='<?php echo $sel_movie; ?>' onclick='linkClick()' target='_blank'>Here is the link for your movie</button> <br /><br />

    Enjoy!</h4>
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

			    <br />
			    </div>
			    
	</div>
	<script>
		var btnValue="https://www.google.com";
		function linkClick() {
			var elem = document.getElementById('ml');
			btnValue = elem.value;
			  
			// jQuery Ajax Post Request
			$.post('movielinkclicked.php', {

			    }, (response) => {
					        // response from PHP back-end
					        console.log(response);
				});
			
			redirect_to_link();
			//location.replace(btnValue);
		}

		function redirect_to_link() {
			location.replace(btnValue);
		}
	</script>



</body>
</html>
