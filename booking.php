<?php
// Validates booking requests, emails them to Ashan Villa, and keeps a CSV backup.
require_once dirname(__FILE__) . '/mailer_config.php';

function clean_input($value) {
    return trim((string)$value);
}

if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#booking');
    exit;
}

$name = isset($_POST['name']) ? clean_input($_POST['name']) : '';
$email_raw = isset($_POST['email']) ? clean_input($_POST['email']) : '';
$email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);
$checkin = isset($_POST['checkin']) ? clean_input($_POST['checkin']) : '';
$checkout = isset($_POST['checkout']) ? clean_input($_POST['checkout']) : '';
$guests_raw = isset($_POST['guests']) ? clean_input($_POST['guests']) : '';
$phone = isset($_POST['phone']) ? clean_input($_POST['phone']) : '';
$requests = isset($_POST['requests']) ? clean_input($_POST['requests']) : '';

$guests = filter_var($guests_raw, FILTER_VALIDATE_INT);
$in = DateTime::createFromFormat('!Y-m-d', $checkin);
$out = DateTime::createFromFormat('!Y-m-d', $checkout);
$today = new DateTime('today');

if ($name === '' || !$email || !$in || !$out || $guests === false || $guests < 1 || $guests > 6 || $in < $today || $out <= $in) {
    http_response_code(400);
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Booking request</title></head><body>';
    echo '<h2>Please check your booking details</h2>';
    echo '<p>Enter your name, valid email, guest count, and valid dates. Check-out must be after check-in.</p>';
    echo '<p><a href="index.php#booking">Return to booking form</a></p></body></html>';
    exit;
}

$body = "New Ashan Villa booking request\n\n";
$body .= "Name: " . $name . "\n";
$body .= "Email: " . $email . "\n";
$body .= "Phone: " . $phone . "\n";
$body .= "Check-in: " . $checkin . "\n";
$body .= "Check-out: " . $checkout . "\n";
$body .= "Guests: " . $guests . "\n";
$body .= "Special requests: " . $requests . "\n";
$body .= "\nThis is a booking request only; it is not an automatic reservation confirmation.";

// Save a CSV backup, even if the SMTP email fails.
$file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bookings.csv';
$fp = fopen($file, 'a');
if ($fp !== false) {
    if (flock($fp, LOCK_EX)) {
        if (filesize($file) === 0) {
            fputcsv($fp, array('Submitted at', 'Name', 'Email', 'Check-in', 'Check-out', 'Guests', 'Phone', 'Requests'));
        }
        fputcsv($fp, array(date('c'), $name, $email, $checkin, $checkout, $guests, $phone, $requests));
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

if (sendVillaEmail('New Villa Booking Request - ' . $name, $body, $email, $name)) {
    header('Location: index.php?booked=1#booking');
    exit;
}

http_response_code(500);
echo '<!doctype html><html><head><meta charset="utf-8"><title>Email error</title></head><body>';
echo '<h2>Booking saved, but email could not be sent</h2>';
echo '<p>Your request was saved as a backup if the CSV file was writable. Please check Gmail App Password and SMTP settings in mailer_config.php.</p>';
echo '<p><a href="index.php#booking">Return to booking form</a></p></body></html>';
?>
