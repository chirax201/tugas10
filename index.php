<?php
include 'config.php'; 
session_start();
if (isset($_SESSION['username'])) { 
    header("Location: sukses_login.php"); 
    exit();
}
if (isset($_POST['submit'])) 
{
    $email = mysqli_real_escape_string ($conn, $_POST['email']);
    $password = hash_hmac('sha256', $_POST['password'], 'secret'); // Hash the input password using hash_hmac
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; 
        header("Location: sukses_login.php");
        exit();
    } else 
    {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.8/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href-"style.css">
    <title>Niagahoster Tutorial</title>
</head>

<body>
    <div class="container">
        <form action-" method="POST" class="login-crail">
            <p class="login-text" style="font-size: 2rom; font-weight: 898;">Login</p>
            <div class="input-group">
                <input type-"email" placeholder-"Email" nare-"email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder-"Password" name="password" required>
            </div>
            <div class="input-group">
                <button nare-"submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>

</html>