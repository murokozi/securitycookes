<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Signing up</title>
<script type="text/javascript">
   
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

</script>
</head>
<body>
<marquee direction="right"><h3>Thank you for signing at this website!</h3></marquee>
<center><form action="signup.php" method="POST">
FirstName: <input type="text"name="FirstName"><br><br>
LastName:&nbsp;<input type="text" name="LastName" width="300"height="300"><br><br>
Email: <input type="email"name="Email" width="300"height="300"required><br><br>
UserName:<input type="text"name="UserName" width="300"height="300"><br><br>
Password:&nbsp;&nbsp;<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 10 or more characters" name="Password" required><br>
<button type="submit" name="signup">SignUp</button>
   <p> Already signed up? <a href="loginForm.php">Log in</a> </p>
</form></center>
</div>
  <div id="message">
  <p id="letter" class="invalid"></p>
  <p id="capital" class="invalid"> </p>
  <p id="number" class="invalid"> </p>
  <p id="length" class="invalid"></p>
</div>
</body>
</html>

