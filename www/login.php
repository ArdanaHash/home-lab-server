<?php
ob_start();

include 'db.php';

$error_message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

    $stmt->bind_param("ss", $user, $pass);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Login Lab - Ardana</title>
</head>
<body>
    <h2>Silakan Login ke Server</h2>
    
    <?php if(!empty($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>

    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    
    <hr>
    <p><a href="index.php">Kembali ke Pencarian Artikel</a></p>
</body>
</html>
