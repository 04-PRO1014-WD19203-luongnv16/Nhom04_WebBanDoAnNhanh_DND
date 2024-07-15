<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify the token
    // (Assuming a database connection is already established)

    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $pdo->prepare("UPDATE users SET verified = 1 WHERE token = ?");
        $stmt->execute([$token]);
        echo 'Your email has been verified successfully.';
    } else {
        echo 'Invalid verification link.';
    }
}
?>
