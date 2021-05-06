<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="theme-color" content="#ffffff"/>
<meta property="og:title" content="Registration Form DECOV 2020" />
<meta property="og:image" itemprop="image" content="img.jpeg">
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.codetigers.org/register">
<meta property="og:description" content="WE CAN FIGHT AGAINST COVID-19" />
<meta property="og:description" content="One of the Biggest Hackathon in India on Covid-19 pandemic" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

input.invalid {
  background-color: #ffdddd;
}
.tab {
  display: none;
}
button {
  background-color: #7B1FA2;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

<form id="regForm" method="post" action="register.php">
  <h1>REGISTER FOR DECOV 2020</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <?php include('errors.php'); ?>
    <label>Username</label>
    <p><input  type="text" placeholder="Username" oninput="this.className = ''" name="username" value="<?php echo $username; ?>" required></p>
    <label>Name</label>
    <p><input type="text" placeholder="Name" oninput="this.className = ''" name="name" value="<?php echo $name; ?>" required></p>
    <label>Email</label>
    <p><input type="email" placeholder="E-mail" oninput="this.className = ''" name="email" value="<?php echo $email; ?>" required></p>
    <label>Mobile No</label>
    <p><input type="number" placeholder="Mobile" oninput="this.className = ''" name="mobile" value="<?php echo $mobile; ?>" required></p>
    <label>Password</label>
    <p><input type="password" placeholder="Password" oninput="this.className = ''" name="password_1" required></p>
    <label>Confirm Password</label>
    <p><input type="password" placeholder="Confirm password" oninput="this.className = ''" name="password_2" required></p>
  </div>
  <div class="tab">College/School:<br>
  <label>College/University name</label>
    <p><input type="text" placeholder="College/University name" oninput="this.className = ''" name="college" value="<?php echo $college; ?>" required></p>
    <label>College/University Roll No</label>
    <p><input type="text" placeholder="Roll..." oninput="this.className = ''" name="roll" value="<?php echo $roll; ?>" required></p>
  </div>
  <div class="tab">1st Round:
    <label>Team Name</label>
    <p><input type="text" placeholder="Team name" oninput="this.className = ''" name="tname" value="<?php echo $tname; ?>" required></p>
    <label>Team Size</label>
    <p><input type="number"  placeholder="Team Size" oninput="this.className = ''" name="tsize" value="<?php echo $tsize; ?>" min="1" max="5" required ></p>
    <label>Problem Code</label>
    <p><input type="text" placeholder="Enter your problem codes separated by ',' E.g. CTH101, CTCC101. Type 'NULL' if you have selected only Innovation." oninput="this.className = ''" name="pcode" value="<?php echo $pcode; ?>" required></p>
    <p2><a id="header_text"  href="javascript:void(0)" onclick="location.href='https://github.com/suvhradipghosh07/WebApp/raw/master/PROBLEM%20STATEMENT%20BROCHURE.pdf'">Problem Statement Brochure</a></p2>
    <br><br>
    <label>Your Innovation Idea</label>
    <p><input type="text" placeholder="Write your innovative idea within 200 characters or write 'NULL' if you didn't choose Innovation" oninput="this.className = ''" name="inno" value="<?php echo $inno; ?>"  required></p>

  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)"></button>
      <button type="submit" class="btn"  name="reg_users">Register</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById('nextBtn').style.visibility = 'hidden';
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>