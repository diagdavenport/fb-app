<?php session_start(); $user_id=$_SESSION['userid']; ?>
<?php

	include 'dbconfig.php';
    
    // Checking, if post value is
    // set by user or not
    if(isset($_POST['btnValue']))
    {
        // Getting the value of button
        // in $btnValue variable
        $btnValue = $_POST['btnValue'];
        $rmCount = $_POST['rmCount'];
        $fullName = $_POST['elemName'];
		echo "$btnValue";
		echo "$rmCount";
		echo "$fullName";
		$firstName = explode(" ", $fullName);
		echo "$firstName[0]";
    	$update_clicked="UPDATE output SET clicked='1' WHERE user_id='$user_id' AND movie_title='$btnValue' AND rec_first_name='$firstName[0]'";
    	$update_rm_count="UPDATE output SET readmore_count='$rmCount' WHERE user_id='$user_id' AND movie_title='$btnValue' AND rec_first_name='$firstName[0]'";
    	
	//mysqli_query($conn,$update_clicked);

		if(mysqli_query($conn,$update_clicked)){
			    echo "Updated successfully using $update_clicked.";
			} else{
			    echo "ERROR: Not able to execute $update_clicked. " . mysqli_error($conn);
			}
		if(mysqli_query($conn,$update_rm_count)){
			    echo "Updated successfully using $update_clicked.";
			} else{
			    echo "ERROR: Not able to execute $update_rm_count. " . mysqli_error($conn);
			}
 
         // Sending Response
        echo "Success";
    }
?>