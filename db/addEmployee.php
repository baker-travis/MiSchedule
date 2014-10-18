<?php

include "database_setup.php";

$firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);

if ($firstName == "" || $lastName == "" || $email == "") {
	die("Must fill out all fields.");
}

$sql = "INSERT INTO Employees (FirstName, LastName, Email)
VALUES ('$firstName', '$lastName', '$email')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "1 record added";
}

$sql = "SELECT PID from Employees WHERE FirstName='$firstName' AND LastName='$lastName'";

$result = mysqli_query($con, $sql);
$theRow = mysqli_fetch_assoc($result);

function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

if (isset($_POST["email"])) {
    // Check if "from" email address is valid
    $mailcheck = spamcheck($_POST["email"]);
    if ($mailcheck==FALSE) {
      echo "Invalid input";
    } else {
      $from = $_POST["from"]; // sender
      $subject = "Sign up to view your schedule!";
      $message = "Dear $firstName $lastName,<br /><br />You have been sent an invitation to view your schedule from the BYU-Idaho Support Center through MiSchedule. Please click <a href='http://scheduling.bakercreations.com/users/sign-up.php?pid=" . $theRow['PID'] . "'>here</a> to sign up.<br /><br />Thank you,<br /><br />MiSchedule Team\n"; //This can now be html. Add links!
      // message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
        
        $headers = "From: " . strip_tags("bak12023@byui.edu") . "\r\n";
		$headers .= "Reply-To: ". strip_tags("bak12023@byui.edu") . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      // send mail
      if (mail($email, $subject, $message, $headers)) {
            echo "Email sent successfully to $email\n";
      }
    }
}

?>
