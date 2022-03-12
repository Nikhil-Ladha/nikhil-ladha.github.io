<?php

  if (isset($_POST['email'])) {

    // Receiver address
    $email_to = "nikhilladha1999@gmail.com";

    function error_handler($error)
    {
        echo $error . "<br><br>";
        die();
    }

    // Validate expected data exists
    if (
        !isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message']) ||
        !isset($_POST['subject'])
    ) {
        error_handler("We're sorry, but there appears to be a problem with the form you submitted. Please try again.");
        die();
    }

    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
    $subject = $_POST['subject']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.';
    }

    if (strlen($subject) < 2) {
        $error_message .= 'The Subject you entered do not appear to be valid.';
    }

    if (strlen($error_message) > 0) {
        error_handler($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- SUCCESS MESSAGE BELOW -->

    Thanks for getting in touch. I'll get back to you soon.

<?php
}
?>