<?php
// Validates contact messages, emails them to Ashan Villa, and keeps a CSV backup.
require_once dirname(__FILE__) . '/mailer_config.php';

function clean_contact_input($value) {
    return trim((string)$value);
}

if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

$name = isset($_POST['name']) ? clean_contact_input($_POST['name']) : '';
$email_raw = isset($_POST['email']) ? clean_contact_input($_POST['email']) : '';
$subject = isset($_POST['subject']) ? clean_contact_input($_POST['subject']) : '';
$message = isset($_POST['message']) ? clean_contact_input($_POST['message']) : '';
$email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);

if ($name === '' || $email === false || $subject === '' || $message === '' || strlen($message) > 3000) {
    http_response_code(400);
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Contact form</title></head><body>';
    echo '<h2>Please check your message</h2>';
    echo '<p>Fill in all fields with a valid email address. Messages must be no longer than 3000 characters.</p>';
    echo '<p><a href="index.php#contact">Return to contact form</a></p></body></html>';
    exit;
}

$body = "New message from the Ashan Villa website\n\n";
$body .= "Name: " . $name . "\n";
$body .= "Email: " . $email . "\n";
$body .= "Subject: " . $subject . "\n\n";
$body .= "Message:\n" . $message;

// Save a CSV backup, even if the SMTP email fails.
$file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'contact-messages.csv';
$fp = fopen($file, 'a');
if ($fp !== false) {
    if (flock($fp, LOCK_EX)) {
        if (filesize($file) === 0) {
            fputcsv($fp, array('Submitted at', 'Name', 'Email', 'Subject', 'Message'));
        }
        fputcsv($fp, array(date('c'), $name, $email, $subject, $message));
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

if (sendVillaEmail('Villa Website Contact: ' . $subject, $body, $email, $name)) {
    header('Location: index.php?sent=1#contact');
    exit;
}

http_response_code(500);
echo '<!doctype html><html><head><meta charset="utf-8"><title>Email error</title></head><body>';
echo '<h2>Message saved, but email could not be sent</h2>';
echo '<p>Your message was saved as a backup if the CSV file was writable. Please check Gmail App Password and SMTP settings in mailer_config.php.</p>';
echo '<p><a href="index.php#contact">Return to contact form</a></p></body></html>';
?>
