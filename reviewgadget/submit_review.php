<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: register.php");
    exit;
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Review Gadget</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h2>Kirim Ulasan</h2>
  <form action="submit_review.php" method="POST">
    <input type="text" name="username" placeholder="Nama Anda" required />
    <select name="rating" required>
      <option value="">Pilih Rating</option>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>
    <textarea name="comment" placeholder="Tulis komentar..." required></textarea>
    <button type="submit">Kirim</button>
  </form>

  <h3>Daftar Ulasan</h3>
  <div id="reviews">
    <?php
    $koneksi = new mysqli("localhost", "root", "", "review_gadget");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $result = $koneksi->query("SELECT * FROM ulasan ORDER BY tanggal DESC");

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='review-item'>";
            echo "<strong>" . htmlspecialchars($row['nama']) . "</strong> - " . str_repeat("⭐", $row['rating']) . "<br>";
            echo "<p>" . htmlspecialchars($row['komentar']) . "</p>";
            echo "<small>" . $row['tanggal'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>Belum ada ulasan.</p>";
    }

    $koneksi->close();
    ?>
  </div>
</body>
</html>
