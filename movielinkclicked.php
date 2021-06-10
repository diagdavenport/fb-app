<?php session_start(); $user_id=$_SESSION['userid']; ?>
<?php

	include 'dbconfig.php';
    
	//echo "ml";
    $update_mlc="UPDATE users SET movie_link_clicked='1' WHERE user_id='$user_id'";

	if(mysqli_query($conn,$update_mlc)){
		    echo "Updated successfully using $update_mlc.";
	} else{
		    echo "ERROR: Not able to execute $update_mlc. " . mysqli_error($conn);
	}
 
    // Sending Response
    echo "Success";
    
?>