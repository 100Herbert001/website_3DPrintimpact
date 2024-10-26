<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Specify your email address
    $to = "3dprintimpact@gmail.com";
    $subject = "Neue Nachricht von Kontaktformular";
    $body = "Name: $name\nE-Mail: $email\nTelefonnummer: $phone\n\nNachricht:\n$message";
    $headers = "From: $email";

    // Send the email and provide feedback
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Die Nachricht wurde erfolgreich gesendet.'); window.location.href = 'Kontaktformular.html';</script>";
    } else {
        echo "<script>alert('Die Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.'); window.location.href = 'Kontaktformular.html';</script>";
    }
} else {
    // Redirect to contact form if accessed directly
    header("Location: Kontaktformular.html");
    exit();
}
?>
