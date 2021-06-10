<?php session_start(); if(isset($_SESSION['userVisited'])){
	if($_SESSION['userVisited']=="1")
    {
        header('Location: exit.html');
        exit;
    }
   }
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

<title>Before we start</title>
<body>

    <h2 class="content-head is-center">Before we start</h2>
    <div style="padding-left: 12px;"><h3 class="content-head is-center"><?php include 'dbconfig.php'; $preconn="SELECT preconnect FROM dynamic_content"; $preconn_statement=mysqli_query($conn,$preconn); while($row = mysqli_fetch_array($preconn_statement)){ echo $row['preconnect'];} ?></h3><br /><br />
	</div>
	<div>
			    
			    <br>
			    <div class="content-head is-center" style="padding-left: 12px;"> 
			    	<button class="button-success pure-button" id="myCheck" onclick="window.location.assign('connect.php')">Proceed </button>
			    <br/>
			    </div>
			    
	</div>

</body>
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

</html>
