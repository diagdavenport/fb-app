<?php session_start(); 
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
    <title>Consented Identity Information</title>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
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
      </style>
    </head>
<body>

    <!-- comments -->
   
    

    <form action="instruction.php" method="post" class="pure-form pure-form-aligned" style="padding-left: 12px;">
         <fieldset>
         <!--<input type="text" name="userid" id="userid"/>-->

        <h1 class="content-head is-center" style="text-align:center;">Please answer the following questions carefully</h1> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">Please indicate your race/ethnicity using the categories below</label>
            <select id="aligned-foo" name="race[]" multiple onchange='checkvalue1(this.value)' required>
                <option disabled selected value>--select an option--</option>
                <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                <option value="Asian">Asian</option>
                <option value="Black">Black</option>        
                <option value="Hispanic">Hispanic</option>
                <option value="Native Hawaiian or Pacific Islander">Native Hawaiian or Pacific Islander</option>
                <option value="Other">Other</option>
                <option value="White">White</option>    
            </select>
            <span class="pure-form-message-inline">(Press Ctrl and then select to choose more than one)</span>
            <input type="text" name="otherBox1" id="otherBox1" style='display:none' placeholder="Enter other race"/>
        </div> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">How would you describe your gender? </label>
            <select id="aligned-foo" name="gender" required>
                <option disabled selected value>--select an option--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-binary">Non-binary</option>
            </select>
        </div> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">How old are you?</label>
            <select id="aligned-foo" name="age" required>
            <option disabled selected value>--select an option--</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
            <option value="60">60</option>
            <option value="61">61</option>
            <option value="62">62</option>
            <option value="63">63</option>
            <option value="64">64</option>
            <option value="65">65</option>
            <option value="66">66</option>
            <option value="67">67</option>
            <option value="68">68</option>
            <option value="69">69</option>
            <option value="70">70</option>
            <option value="71">71</option>
            <option value="72">72</option>
            <option value="73">73</option>
            <option value="74">74</option>
            <option value="75">75</option>
            <option value="76">76</option>
            <option value="77">77</option>
            <option value="78">78</option>
            <option value="79">79</option>
            <option value="80">80</option>
        </select>
        </div> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">Please select your highest completed level of education</label>
            <select id="aligned-foo" name="education" required>
                <option disabled selected value>--select an option--</option>
                <option value="Did not graduate high school">Did not graduate high school</option>
                <option value="Graduated high school">Graduated high school</option>
                <option value="Some college, no degree">Some college, no degree</option>
                <option value="Associate degree">Associate's degree</option>
                <option value="Bachelor degree">Bachelor's degree</option>
                <option value="Master degree">Master's degree</option>
                <option value="Professional degree">Professional degree</option>
                <option value="Doctoral degree">Doctoral degree</option>
        </select>
        </div> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">How often do you watch movies?</label>
            <select id="aligned-foo" name="frequency" required>
                <option disabled selected value>--select an option--</option>
                <option value="Every day">Every day</option>
                <option value="Several times a week">Several times a week</option>
                <option value="Once a month">Once a month</option>
                <option value="A few times a year">A few times a year</option>
                <option value="Once a year">Once a year</option>
                <option value="Never">Never</option>
            </select>
        </div> <br/>

        <div class="pure-control-group">
            <label for="aligned-foo">What is your favourite movie genre?</label>
            <select id="aligned-foo" name="genre" onchange='checkvalue6(this.value)' required>
                <option disabled selected value>--select an option--</option>
                <option value="Action and adventure">Action and adventure</option>
                <option value="Animation">Animation</option>
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Historical">Historical</option>
                <option value="Horror">Horror</option>
                <option value="Science Fiction">Science Fiction</option>
                <option value="Other">Other</option>
            </select>

            <input type="text" name="otherBox6" id="otherBox6" style='display:none' placeholder="Enter other genre" />
        </div> <br/>

         <a>We need to know how you usually access the internet. In this case, however, we want to check that people take the time they need to read the instructions. To show that you’ve read carefully, please ignore the question below and simply select the response category "I do not have access to the internet" to move on to the next question.<br> <br> </a>
        <div class="pure-control-group">
            <label for="aligned-foo">How do you usually access the internet?</label>
            <select id="aligned-foo" name="access" required>
                <option disabled selected value>--select an option--</option>
                <option value="0">I use my smartphone</option>
                <option value="0">I use my computer</option>
                <option value="0">I use a communal/public device</option>
                <option value="1">I do not have access to the internet</option>
            </select>
            
        </div> <br/>
        <input type="hidden" id="userid" name="userid">
        <input type="submit" value="Submit" id="aligned-foo" style="height:30px;width:100px" >
        </fieldset>
    </form>

    <script>
     
              function initFingerprintJS() {
                // Initialize an agent at application startup.
                const fpPromise = FingerprintJS.load()

                // Get the visitor identifier when you need it.
                fpPromise
                  .then(fp => fp.get())
                  .then(result => {
                    // This is the visitor identifier:
                    const visitorId = result.visitorId
                    //document.print(visitorId)
                    document.getElementById("userid").value = visitorId
                  })
                  .catch(error => console.error(error))
              }
            
            
        const btn1 = document.querySelector('#btn1');
        const sb1 = document.querySelector('#race[]')
        btn1.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb1.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };

        const btn2 = document.querySelector('#btn2');
        const sb2 = document.querySelector('#gender')
        btn2.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb2.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };

        const btn3 = document.querySelector('#btn3');
        const sb3 = document.querySelector('#age')
        btn3.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb3.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };  

        const btn4 = document.querySelector('#btn4');
        const sb4 = document.querySelector('#education')
        btn4.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb4.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };

        const btn5 = document.querySelector('#btn5');
        const sb5 = document.querySelector('#movies')
        btn5.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb5.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };

        const btn6 = document.querySelector('#btn6');
        const sb6 = document.querySelector('#genre')
        btn6.onclick = (e) => {
            e.preventDefault();
            const selectedValues = [].filter
                .call(sb6.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues);
        };

        const btn7 = document.querySelector('#btn7');
        const sb7 = document.querySelector('#access')
        btn7.onclick = (e) => {
            e.preventDefault();
            const selectedValues7 = [].filter
                .call(sb7.options, option => option.selected)
                .map(option => option.text);
            alert(selectedValues7);
        };

        function checkvalue1(val){
         if(val=="Other")
           document.getElementById('otherBox1').style.display='block';
            else
           document.getElementById('otherBox1').style.display='none';
        }

        function checkvalue6(val){
         if(val=="Other")
           document.getElementById('otherBox6').style.display='block';
            else
           document.getElementById('otherBox6').style.display='none';
        }

    </script>
    <script
      async
      src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"
      onload="initFingerprintJS()"
      onerror="console.error('Failed to load the script')"
    ></script>
    </body>
</html>