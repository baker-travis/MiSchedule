<?php

include "database_setup.php";

$firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);

$sql = "INSERT INTO Employees (FirstName, LastName, Email)
VALUES ('$firstName', '$lastName', '$email')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "1 record added";
}

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
      $message = "You have been sent an invitation to view your schedule from the BYU-Idaho Support Center."; //This can now be html. Add links!
      // message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
        
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: bak12023@byui.edu' . "\r\n";
      // send mail
      if (mail($email, $subject, $message, $headers)) {
            echo "Email sent successfully\n";
      }
    }
}

?>
