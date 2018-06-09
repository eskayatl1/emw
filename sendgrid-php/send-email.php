<?php
/*SendGrid Library*/
//require_once ('vendor/autoload.php');

require './sendgrid-php.php';

//Post Data
$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_tel = $_POST['tel'];
$contact_subject = $_POST['subject'];
$contact_message = $_POST['message'];

//Content
$from = new SendGrid\Email(null, "info@eddymotorworks.com");
$subject = "EddyMotorWorks -New Message from '.$contact_name'";
$to = new SendGrid\Email(null, "shravy24@gmail.com");
$content = new SendGrid\Content("text/plain", "
.You have a new message from your website.
.Subject: {$contact_subject}
.Name: {$contact_name}
.Email: {$contact_email}
.Phone number: {$contact_tel}
.Message: {$contact_message}
");

/*Send the mail*/
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = ('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');
$sg = new \SendGrid($apiKey);

/*Response*/
$response = $sg->client->mail()->send()->post($mail);
echo $response-> statusCode();
?>
