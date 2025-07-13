<?php
session_start();
include 'koneksi.php'; // Hubungkan ke database

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Cek apakah username sudah digunakan
    $check = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, SHA2(?, 256))");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header("Location: login.php?register=success");
            exit;
        } else {
            $error = "Gagal mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar - Review Gadget</title>
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
    .register-box {
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
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Daftar Pengguna</h2>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Daftar">
    </form>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  </div>
</body>
</html>
