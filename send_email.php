<?php
// Enable error reporting to see any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Starting script...<br>";

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

echo "Autoload included.<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form submitted.<br>";

    // Retrieve and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        echo "Configuring SMTP...<br>";

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.web.de';
        $mail->SMTPAuth = true;
        $mail->Username = 'k.printimpact@web.de'; // Your Web.de email
        $mail->Password = 'f-&bsxJ=8RWw';         // Your Web.de email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        echo "SMTP configured.<br>";

        // Recipients
        $mail->setFrom('k.printimpact@web.de', 'Kontaktformular'); // Use your Web.de email here
        $mail->addAddress('3dprintimpact@gmail.com'); // Recipient email

        echo "Recipients set.<br>";

        // Email content
        $mail->Subject = 'Neue Nachricht von Kontaktformular';
        $mail->Body = "Name: $name\nE-Mail: $email\nTelefonnummer: $phone\n\nNachricht:\n$message";

        // Send the email
        $mail->send();
        echo "<script>alert('Die Nachricht wurde erfolgreich gesendet.'); window.location.href = 'Kontaktformular.html';</script>";
    } catch (Exception $e) {
        echo "Fehler: {$mail->ErrorInfo}";
    }
} else {
    echo "Redirecting to form page...";
    header("Location: Kontaktformular.html");
    exit();
}
?>
