<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(50));

    // Store user data and token in the database
    // (Assuming a database connection is already established)

    $stmt = $pdo->prepare("INSERT INTO users (email, password, token) VALUES (?, ?, ?)");
    $stmt->execute([$email, $password, $token]);

    // Send verification email
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; //địa chỉ server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nguyenphuongnam.intern@gmail.com';
        $mail->Password   = 'jnoz efff dzce nnrt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; //465

        // Recipients
        $mail->setFrom('your-email@example.com', 'Mailer');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Verify your email address';
        $mail->Body    = 'Please click on the following link to verify your email: <a href="http://yourwebsite.com/verify.php?token=' . $token . '">Verify Email</a>';

        $mail->send();
        echo 'A verification email has been sent to your email address.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
