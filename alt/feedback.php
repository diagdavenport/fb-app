<?php session_start(); 
if(isset($_SESSION['userVisited']))
  {  if($_SESSION['userVisited']=="1")
    {
        header('Location: exit.html');
        exit;
    }

    //Check user cookie on whether they've completed the survey already
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
        <style>
      
       	label:before {
		  content: '☆';
		  color: black;
		  font-size: 2em;
		}
		label.on:before {
		  content: '★';
		  color: black;
		  /* uncomment for iOS */
		/*   font-size: 2.4em;
		  top: -0.1em;
		  left: -0.1em; */
		}
		input:checked + label:before {
		  content: '★'; 
		  color: black;
		  /* uncomment for iOS */
		/*   font-size: 2.4em;
		  top: -0.1em;
		  left: -0.1em; */
		}
		label {  
		  display: inline-block;  
		  cursor: pointer;  
		  position: relative;  
		  padding-left: 25px;  
		  margin-right: 15px;  
		  font-size: 20px; 
		}
		label:before {
		  display: inline-block;
		  width: 20px;
		  height: 20px;
		  margin-right: 10px;
		  position: absolute;
		  left: 0;
		  border-radius: 10px;
		}
		input[type=radio] {
		  display: none;
		  -webkit-appearance: none;
		}

 
        </style>
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

</head>

<title>Feedback</title>
<body>
	
	<h1 class="content-head is-center"><u>Please share your feedback</u></h1>
	<form action="thankyou.php" method="post" class="pure-form pure-form-aligned" style="padding-left: 12px;">

	  <div class="question" id="q1" class="content-head is-center" style="text-align:center;">
	    <h2 class="content-head is-center">How would you rate the selection of movies available to you?*</h2>
	    [1 star = Not at all appealing]
	    <input type="radio" name="rate" id="a1" value="1" required>
	    <label for="a1"></label>
	    <input type="radio" name="rate" id="a2" value="2">
	    <label for="a2"></label>
	    <input type="radio" name="rate" id="a3" value="3">
	    <label for="a3"></label>
	    <input type="radio" name="rate" id="a4" value="4">
	    <label for="a4"></label>
	    <input type="radio" name="rate" id="a5" value="5">
	    <label for="a5"></label>
	    <input type="radio" name="rate" id="a6" value="6">
	    <label for="a6"></label>
	    <input type="radio" name="rate" id="a7" value="7">
	    <label for="a7"></label>
	    [7 stars = Exactly what I wanted]
	    
	  </div><br /><br />

	  <div class="question" id="q2" class="content-head is-center" style="text-align:center;">
	    <h2 class="content-head is-center">How satisfied were you with the movies you chose?*</h2>
	    [1 star = Not at all satisfied]
	    <input type="radio" name="satisfied" id="b1" value="1" required>
	    <label for="b1"></label>
	    <input type="radio" name="satisfied" id="b2" value="2">
	    <label for="b2"></label>
	    <input type="radio" name="satisfied" id="b3" value="3">
	    <label for="b3"></label>
	    <input type="radio" name="satisfied" id="b4" value="4">
	    <label for="b4"></label>
	    <input type="radio" name="satisfied" id="b5" value="5">
	    <label for="b5"></label>
	    <input type="radio" name="satisfied" id="b6" value="6">
	    <label for="b6"></label>
	    <input type="radio" name="satisfied" id="b7" value="7">
	    <label for="b7"></label>
	    [7 stars = Very satisfied]
	  </div><br /><br />

	  <div class="question" id="q3" class="content-head is-center" style="text-align:center;">
	    <h2 class="content-head is-center">How likely are you to use your earnings to rent the movie?*</h2>
	    [1 star = Not at all likely]
	    <input type="radio" name="likely" id="c1" value="1" required>
	    <label for="c1"></label>
	    <input type="radio" name="likely" id="c2" value="2">
	    <label for="c2"></label>
	    <input type="radio" name="likely" id="c3" value="3">
	    <label for="c3"></label>
	    <input type="radio" name="likely" id="c4" value="4">
	    <label for="c4"></label>
	    <input type="radio" name="likely" id="c5" value="5">
	    <label for="c5"></label>
	    <input type="radio" name="likely" id="c6" value="6">
	    <label for="c6"></label>
	    <input type="radio" name="likely" id="c7" value="7">
	    <label for="c7"></label>
	    [7 stars = Very likely]
	  </div><br /><br />

	  <div class="question" id="q4" style="text-align:center;" required>
	    <h2 class="content-head is-center">How much did you rely on the recommendation to make your choices?*</h2>
	    [1 star = Recommendations didn’t matter at all]
	    <input type="radio" name="rely" id="d1" value="1" required>
	    <label for="d1"></label>
	    <input type="radio" name="rely" id="d2" value="2">
	    <label for="d2"></label>
	    <input type="radio" name="rely" id="d3" value="3">
	    <label for="d3"></label>
	    <input type="radio" name="rely" id="d4" value="4">
	    <label for="d4"></label>
	    <input type="radio" name="rely" id="d5" value="5">
	    <label for="d5"></label>
	    <input type="radio" name="rely" id="d6" value="6">
	    <label for="d6"></label>
	    <input type="radio" name="rely" id="d7" value="7">
	    <label for="d7"></label>
	    [7 stars = My decisions were based solely on recommendations]
	  </div><br /><br />

	  <div class="question" id="q5">
	  <h2 class="content-head is-center">What do you think this study is about?*</h2>
	  <input type="text" name="think" id="q5" required>
	  </div><br />

	  <div class="question content-head is-center" id="q6">
	  <h2 class="content-head is-center">Anything else you’d like to share with us?*</h2>
	  <input type="text" name="study" id="q6" required>
	  </div><br />


	  <input class="button-success pure-button is-center" type="submit" value="Submit (All questions are mandatory)" id="submit">

	</form>

</body>

<script>
	$('input[type="radio"]').click(function() {
	  var theNumber = $(this).attr('id').slice(-1);
	  $(this).siblings('label').each(function() {
	    var sibNumber = $(this).attr('for').slice(-1);
	    if (sibNumber <= theNumber) {
	      $(this).addClass('on');
	    } else {
	      $(this).removeClass('on');
	    }
	  });
	});
</script>

</html>
