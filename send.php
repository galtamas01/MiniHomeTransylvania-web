<?php
$vezeteknev = htmlspecialchars($_POST['vezeteknev'] ?? '');
$keresztnev = htmlspecialchars($_POST['keresztnev'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$haztipus = htmlspecialchars($_POST['haztipus'] ?? '');
$igenyek = htmlspecialchars($_POST['igenyek'] ?? '');

$to = '';

$subject = 'Új érdeklődés érkezett a weboldalról';

$message = "Érdeklődő adatai:\n\n";
$message .= "Név: $vezeteknev $keresztnev\n";
$message .= "Email: $email\n";
$message .= "Ház típusa: $haztipus\n";
$message .= "Igények:\n$igenyek\n";

$headers = "From: MiniHome <noreply@minihome.hu>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    header("Location: index.html");
    exit();
} else {
    echo "Hiba történt a küldéskor!";
}
?>