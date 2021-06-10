# fb-app

Technologies Used: LAMP stack, HTML, pHp, javascript (with jQuery and AJAX), CSS, MySQL

Deployment: AWS EC2 instance, Amazon Linux 2, GitHub, AWS S3

Logical Flow in the Best Case: index.html -> information.php -> instruction.php -> preconnect.php / preconnect2.php -> connect.php / connect2.php -> feedback.php -> thankyou.php

Other Files and Folders in the Flow: 
•	dbconfig.php: connect to the database.
•	exit.html: in case of survey already completed OR in case of wrong option selected.
•	loadmore.php: loads more movies in realtime to the connect.php page from database.
•	loadmore2.php: loads more movies in realtime to the connect2.php page from database.
•	addtolist.php: updates movie selection to the database by user in realtime.
•	removefromlist.php: updates movie un-selection by user to the database in realtime.
•	movielinkclicked.php: tracks in realtime behind the thankyou.php page from database whether user clicked on the movie link provided on the thank you page. 
•	js/: all javascript files
•	css/: all styling files

Frameworks used:
•	PureCSS for styling, fonts, grids, and other UI elements
•	FingerprintJS for UserID Generation per browser: https://github.com/fingerprintjs/fingerprintjs
•	Clock Timer for connect2.php: https://css-tricks.com/how-to-create-an-animated-countdown-timer-with-html-css-and-javascript/ 
•	TimeMe to track user engagement time

Database Name: boothcaai1

Database Tables: fname (Input List of first names), lname (Input List of last names), movies_1 (Input List of movies), users (Output List of all users with User ID who use the portal with specific details), output (Output generated out of User Experience tracked with User ID), dynamic_content (Updatable content for specific pages)

