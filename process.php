<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Niepoprawny adres email.";
        exit;
    }

    $to = "xogan37748@cironex.com"; //swój adres e-mail
    $subject = "Nowa wiadomość od $name";
    $body = "Imię: $name\nEmail: $email\nWiadomość:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Wiadomość została wysłana.";
    } else {
        echo "Wystąpił problem z wysłaniem wiadomości.";
    }

    echo "<h2>Otrzymane dane:</h2>";
    echo "<p><strong>Imię:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Wiadomość:</strong><br>$message</p>";
} else {
    echo "Nieprawidłowe Info.";
}
?>
