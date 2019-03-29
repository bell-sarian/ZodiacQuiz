	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chinese Zodiac Quiz</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
function validateInput($data, $fieldName) {
     global $errorCount;
     if (strlen($data)<=0) {
          echo "\"$fieldName\" is a required field.<br />\n";
          ++$errorCount;
          $retval = "";
     } else { // Only clean up the input if it isn't empty
          $retval = trim($data);
          $retval = stripslashes($retval);
          if (is_numeric($retval)) {
             if ($retval<=0) {
                echo "\"$fieldName\" must be a string<br />\n";
                ++$errorCount;
             }
          } else {
             echo "\"$fieldName\" must be a valid email address.<br />\n";
             ++$errorCount;
             $retval = "";
          }
     }
     return($retval);
}
function validateName($data, $fieldName) {
    global $errorCount;
     if (strlen($data)<=0) {
          echo "\"$fieldName\" is a required field.<br />\n";
          ++$errorCount;
          $retval = "";
     } else { // Only clean up the input if it isn't empty
          $retval = trim($data);
          $retval = stripslashes($retval);
          if (is_numeric($retval)) {
             if ($retval<=0) {
                echo "\"$fieldName\" must be a number greater than 0.<br />\n";
                ++$errorCount;
             }
          } else {
             echo "\"$fieldName\" must be a string.<br />\n";
             ++$errorCount;
             $retval = "";
          }
     }
     return($retval);
}
function displayForm($wage, $hours) { // Function to display the web form
?>
<h2 style = "text-align:center">Chinese Zodiac Quiz</h2>
<form name = "Quiz" action = "Quiz3.php" method = "post">
<p>Player Info: </p>
	<p>
	Name <input type="text" name="name" value="<?php ; ?>" />
	Email<input type="text" name="email" value="<?php ; ?>" />
	</p>
<p>The Chinese zodiac associates a sign with each month. </p>
	<p>
	True <input type="radio" name="Q1" value="<?php True; ?>" />
	False<input type="radio" name="Q1" value="<?php False; ?>" />
	</p>
<p>Chinese zodiac signs represent different types of personalities.</p>
	<p>
	True <input type="radio" name="Q2" value="<?php True; ?>" />
	False<input type="radio" name="Q2" value="<?php False; ?>" />
	</p>
<p>The Chinese zodiac signs each have an equivalent constellations, like those of the occidental zodiac.</p>
	<p>
	True <input type="radio" name="Q3" value="<?php True; ?>" />
	False<input type="radio" name="Q3" value="<?php False; ?>" />
	</p>
<p>Which sign is not part of the Chinese zodiac?</p>
	<p>
	Rat <input type="radio" name="Q4" value="Rat" />
	Pig<input type="radio" name="Q4" value="Pig" />
	Fox<input type="radio" name="Q4" value="Fox" />
	Tiger<input type="radio" name="Q4" value="Tiger" />
	</p>
<p>The Chinese zodiac traditionally begins with which sign?</p>
	<p>
	Rat <input type="radio" name="Q5" value="Rat" />
	Pig<input type="radio" name="Q5" value="Pig" />
	Fox<input type="radio" name="Q5" value="Fox" />
	Tiger<input type="radio" name="Q5" value="Tiger" />
	</p>
<p>The Chinese zodiac traditionally ends with which sign?</p>
	<p>
	Rat <input type="radio" name="Q6" value="Rat" />
	Pig<input type="radio" name="Q6" value="Pig" />
	Fox<input type="radio" name="Q6" value="Fox" />
	Tiger<input type="radio" name="Q6" value="Tiger" />
	</p>
	
<p>How many signs are in the Chinese zodiac?</p>
	<p>
	<input type="text" name="Q7" />
	</p>
<p>Which is the only reptile that is a sign in the Chinese zodiac?</p>
	<p>
	<input type="text" name="Q8"/>
	</p>
<p>Which is the only imaginary animal that is a sign in the Chinese zodiac?</p>
	<p>
	<input type="text" name="Q9"/>
	</p>
<p>Which is the only bird that is a sign in the Chinese zodiac?</p>
	<p>
	<input type="text" name="Q10"/>
	</p>

<p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Send Form" /></p>
</form>
<?php
// end form


}





$ShowForm = TRUE; // Boolean to see whether to display the form
$errorCount = 0; // count the errors acumulated
$name = ""; // initialize name
$email = ""; // initialize email

if (isset($_POST['Submit'])) { // If the submit button is pressed
     //$name = validateName($_POST['Name'],"Name");
     //$email = validateInput($_POST['Email'],"Email");
	 
	if(isset($_POST["name"])) { // if name is not empty
		$name = $_POST["name"]; // assign php value to html value
	} else {
		$errorCount++;
		echo "<br>Name is a required field<br>"; // require user to enter field
	}
	if(isset($_POST["email"])) { // if email is not empty
		$email = $_POST["email"]; // assign php value to html value
	} else {
		echo "<br>Email is a required field<br>"; // require user to enter field
		$errorCount++;
	}
	if(isset($_POST["Q1"])) {
		$Q1 = $_POST["Q1"];
	} else $errorCount++;
	if(isset($_POST["Q2"])) {
		$Q2 = $_POST["Q2"];
	} else $errorCount++;
	if(isset($_POST["Q3"])) {
		$Q3 = $_POST["Q3"];
	} else $errorCount++;
	if(isset($_POST["Q4"])) {
		$Q4 = $_POST["Q4"];
	} else $errorCount++;
	if(isset($_POST["Q5"])) {
		$Q5 = $_POST["Q5"];
	} else $errorCount++;
	if(isset($_POST["Q6"])) {
		$Q6 = $_POST["Q6"];
	} else $errorCount++;
	if(isset($_POST["Q7"]) && strlen($_POST["Q7"]) !== 0) {
		$Q7 = $_POST["Q7"];
	} else $errorCount++;
	if(isset($_POST["Q8"]) && strlen($_POST["Q8"]) !== 0) {
		$Q8 = $_POST["Q8"];
	} else $errorCount++;
	if(isset($_POST["Q9"])&& strlen($_POST["Q9"]) !== 0) {
		$Q9 = $_POST["Q9"];
	} else $errorCount++;
	if(isset($_POST["Q10"]) && strlen($_POST["Q10"]) !== 0) {
		$Q10 = $_POST["Q10"];
	} else $errorCount++;
	echo "<br>Please fill out the entire form in order to procede<br>";
	echo "<br>Number blank: $errorCount<br>";
     if ($errorCount==0) // if no errors were found in converting html to PHP
          $ShowForm = FALSE;
     else
          $ShowForm = TRUE;
	  
}
if ($ShowForm == TRUE) {
     if ($errorCount>0) // if there were errors
          echo "<p>Please re-enter the form information below.</p>\n";
     displayForm($name, $email);
} 
else {
	$numCorrect = 0;
	if ($Q1 == False) {
		echo "The Chinese zodiac associates a sign with each month. ~ F<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "The Chinese zodiac associates a sign with each month. ~ F<br>✘<br>";
	if ($Q2 == True) {
		echo "Chinese zodiac signs represent different types of personalities.~ T<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "Chinese zodiac signs represent different types of personalities.~ T<br>✘<br>";
	if ($Q3 == False) {
		echo "The Chinese zodiac signs each have an equivalent constellations, like those of the occidental zodiac.~F<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "The Chinese zodiac signs each have an equivalent constellations, like those of the occidental zodiac.~F<br>✘<br>";
	if ($Q4 == "Fox") {
		echo "Which sign is not part of the Chinese zodiac?~ Fox<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "Which sign is not part of the Chinese zodiac?~ Fox<br> ✘<br>";
	if ($Q5 == "Rat") {
		echo "The Chinese zodiac traditionally begins with which sign?~ Rat<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "The Chinese zodiac traditionally begins with which sign?~ Rat <br> ✘<br>";
	if ($Q6 == "Pig") {
		echo "The Chinese zodiac traditionally ends with which sign?~Pig <br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "The Chinese zodiac traditionally ends with which sign?~ Pig<br> ✘<br>";
	if ($Q7 == "Twelve" || $Q7 == 12) {
		echo "How many signs are in the Chinese zodiac?~ Twelve|12<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "How many signs are in the Chinese zodiac?~Twelve|12 <br> ✘<br>";
	if ($Q8 == "Snake") {
		echo "Which is the only reptile that is a sign in the Chinese zodiac?~ Snake<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "Which is the only reptile that is a sign in the Chinese zodiac?~ Snake<br> ✘<br>";
	if ($Q9 == "Dragon") {
		echo "Which is the only imaginary animal that is a sign in the Chinese zodiac?~ Dragon<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "Which is the only imaginary animal that is a sign in the Chinese zodiac?~ Dragon<br> ✘<br>";
	if ($Q10 == "Rooster") {
		echo "Which is the only bird that is a sign in the Chinese zodiac?~ Rooster<br>";
		echo "✔<br>";
		$numCorrect++;
	} else echo "Which is the only bird that is a sign in the Chinese zodiac?~ Rooster<br> ✘<br>";
	
	
	echo "You got $numCorrect correct out of 10!<br>";
	$percent = ($numCorrect/10)*100;
	echo "A score of $percent %";
	
	mail($email, "Test Results", "You got a score of $percent % on the chinese zodiac quiz!");
}
?>
</body>
</html>
