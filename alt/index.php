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

<title>Consent Policy</title>
<body>

	
    <h2 class="content-head is-center">Consent Policy</h2>
    <div style="padding-left: 12px;">
	Principal Investigator: Sendhil Mullainathan<br />Student Researcher: Diag Davenport<br />IRB Study Number: 21-0412 <br><br><b>DESCRIPTION:</b> We are researchers at the University of Chicago doing a research study on recommendations and social interactions. Participation should take about 10 minutes.<br /><br /> During the study, you will be asked about your online behavior, then you will be shown some online content and we’ll ask you to indicate whether you like the items.<br><br><b>RISKS and BENEFITS:</b> The risks to your participation in this online study are those associated with basic computer tasks, including boredom, fatigue, mild stress, or breach of confidentiality. As with all research, there is a chance that confidentiality of the information we collect from you could be breached. We will take steps to minimize this risk, as discussed in more detail below in this form. All data will be stored on a secure encrypted server in UChicago box. The only benefit to you is the learning experience from participating in a research study. The benefit to society is the contribution to scientific knowledge. <br><br><b>COMPENSATION:</b> Participants will be paid <?php include 'dbconfig.php'; $get_compensation="SELECT index_compensation FROM dynamic_content";
    	$compensation=mysqli_query($conn,$get_compensation); while($row = mysqli_fetch_array($compensation)){ echo $row['index_compensation'];} ?> for their time. <br><br><b>CONFIDENTIALITY:</b> We will not be storing or recording any personally identifying information about you that you may have put online. Any reports and presentations about the findings from this study will not include your name or any other information that could identify you. We may share the data we collect in this study with other researchers doing future studies. If we share your data, we will not include information that could identify you. <br><br><b>SUBJECT&#39;S RIGHTS:</b> Your participation is voluntary. You may stop participating at any time by closing the browser window or the program to withdraw from this study. Partial data will not be analyzed. For additional questions about this research, you may contact: Diag Davenport at diag@uchicago.edu. <br><br>For questions about your rights as a research participant, you may contact: <br><br><b>Social & Behavioral Sciences Institutional Review Board <br><br>University of Chicago 1155 E. 60th Street, Room 418 Chicago, IL 60637 Phone: (773) 834-7835 Email: sbs-irb@uchicago.edu </b>

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
			    <br> <div style="padding-left: 12px;">  Please indicate by clicking the 'Yes' button that you are at least 18 years old, have read and understand this consent form, and you agree to participate in this online research study.</div> 
			    <br> <div style="padding-left: 12px;"> <button class="button-success pure-button" id="myCheck" onclick='window.location.assign("information.php")'>Yes</button>
			    <button class="button-error pure-button" id="myCheck" onclick='window.location.assign("exit.html")'>No</button><br /><br />
			    </div>
			    
	</div>

</body>

</html>
