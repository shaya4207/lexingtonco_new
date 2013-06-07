<?php
  $popup_type = $_POST['popup_type'];
  $prop_id = $_POST['prop_id'];
  $your_name = $_POST['your_name'];
  $your_email = $_POST['your_email'];
  $from = $your_name . "<" . $your_email . ">";
  $rec_name = $_POST['rec_name'];
  $rec_email = $_POST['rec_email'];
  $rec_sub = $_POST['email_sub'];
  $email_message = $_POST['email_message'];
  
  if($popup_type == 'email_agent') {
    $message = $your_name . " sent you the following message regarding " . $rec_sub . ":\r\n \r\n " . $email_message;
  } else if($popup_type == 'email_property_link') {
    $message = $your_name . " would like to let you know about " . $rec_sub . ". Click on the following link (http://parkmg.com/lexingtonco/properties/single/?prop=" . $prop_id . ") for more information";
    if(!empty($email_message)) {
      $message .= "\r\n \r\n " . $email_message;
    }
  }
  
  $headers = 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $your_email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  $mail = mail($rec_email, $rec_sub, $message, $headers);
  if($mail) {
    echo "Email sent successfully!";
  } else {
    echo "There was an error, please try again";
  }
?>