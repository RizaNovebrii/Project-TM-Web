<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role']; // Tangkap role dari form

    $query = "SELECT * FROM users WHERE username = ? AND password = SHA2(?, 256) AND role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        header("Location: index.php");
        exit();
    } else {
        $error = "Username, password, atau role salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Review Gadget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #222;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #000;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #00bcd4;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background: #0097a7;
        }
        .error {
            color: #f44336;
            margin-top: 10px;
        }
        a {
            color: #00bcd4;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login Admin</h2>
    <?php if (isset($_GET['register']) && $_GET['register'] === 'success') {
    echo "<p style='color:lightgreen;'>Pendaftaran berhasil! Silakan login.</p>";
    } ?>

    <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="hidden" name="role" value="<?= htmlspecialchars($_GET['role'] ?? 'user') ?>">
    <input type="submit" value="Login">
</form>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <p style="margin-top: 15px;">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>
</body>
</html>
