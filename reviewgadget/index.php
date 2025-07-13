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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Review Gadget</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

  <div style="text-align: right; padding: 10px;">
    <a href="login.php" style="color: #00bcd4; text-decoration: none;">Login Admin</a>
  </div>

  <header>
    <div class="container">
      <h1>Review Gadget by Riza Novebri</h1>
      <nav>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Review</a></li>
          <li><a href="#">Rekomendasi</a></li>
          <li><a href="#">Tentang</a></li>

          <?php if (!isset($_SESSION['username'])): ?>
  <li><a href="login.php?role=user">Login Pengguna</a></li>
  <li><a href="login.php?role=admin">Login Admin</a></li>
<?php else: ?>
  <li><a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
<?php endif; ?>

        </ul>
      </nav>
    </div>
  </header>


  <section class="hero">
    <div class="container">
      <h2>Temukan Review Gadget Terkini</h2>
      <p>Dapatkan informasi lengkap dan terpercaya sebelum membeli gadget impianmu!</p>
    </div>
  </section>

  <section class="kategori container">
  <input type="text" id="searchInput" placeholder="Cari gadget..." />
  <br><br>
  <button class="filter-btn" data-kategori="all">Semua</button>
  <button class="filter-btn" data-kategori="hp">HP</button>
  <button class="filter-btn" data-kategori="laptop">Laptop</button>
  <button class="filter-btn" data-kategori="aksesoris">Aksesoris</button>
</section>


  <section class="reviews container">
    <div class="card" data-kategori="hp">
      <img src="images/V40 Lite 5G.png" alt="Smartphone V40 Lite 5G" loading="lazy">
      <h3>V40 Lite 5G</h3>
      <p>Performa tinggi, kamera luar biasa, dan desain premium. Layak dibeli?</p>
      <a href="detail.php?id=v40-lite-5g" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/V50 5G.png" alt="Smartphone V50 5G" loading="lazy">
      <h3>V50 5G</h3>
      <p>Elegan dalam genggaman</p>
      <a href="detail.php?id=V50-5G" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/V50 Lite 5G.png" alt="Smartphone V50 Lite 5G" loading="lazy">
      <h3>V50 Lite 5G</h3>
      <p>Bukan sekadar ponsel, ini adalah pernyataan gaya</p>
      <a href="detail.php?id=V50-Lite-5G" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/V50 Lite.png" alt="Smartphone V50 Lite" loading="lazy">
      <h3>V50 Lite</h3>
      <p>Kekuatan sejati, hadir tanpa kompromi</p>
      <a href="detail.php?id=V50-Lite" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/X Fold3 Pro.png" alt="Smartphone X Fold3 Pro" loading="lazy">
      <h3>X Fold3 Pro</h3>
      <p>Dari multitasking hingga gaming, semuanya mulus</p>
      <a href="detail.php?id=X-Fold3-Pro" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/X100 Pro.png" alt="Smartphone X100 Pro" loading="lazy">
      <h3>X100 Pro</h3>
      <p>Teknologi biometrik untuk perlindungan maksimal</p>
      <a href="detail.php?id=X100-Pro" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/X200 Pro.png" alt="Smartphone X200 Pro" loading="lazy">
      <h3>X200 Pro</h3>
      <p>Teknologi tinggi, tampilan elegan</p>
      <a href="detail.php?id=X200-Pro" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/X200.png" alt="Smartphone X200" loading="lazy">
      <h3>X200</h3>
      <p>Genggam kemewahan dalam bentuk teknologi</p>
      <a href="detail.php?id=X200" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/Y19s Pro.png" alt="Smartphone Y19s Pro" loading="lazy">
      <h3>Y19s Pro</h3>
      <p>Estetika dan performa, berpadu sempurna</p>
      <a href="detail.php?id=Y19s-Pro" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/Y19s.png" alt="Smartphone Y19s" loading="lazy">
      <h3>Y19s</h3>
      <p>Canggih? itu benar</p>
      <a href="detail.php?id=Y19s" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/Y19sGT 5G.png" alt="Smartphone Y19sGT 5G" loading="lazy">
      <h3>Y19sGT 5G</h3> <p>Wujudkan kesempurnaan dalam setiap detail</p>
      <a href="detail.php?id=Y19sGT-5G" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/Y29.png" alt="Smartphone Y29" loading="lazy">
      <h3>Y29</h3>
      <p>Satu sentuhan, ribuan kesan</p>
      <a href="detail.php?id=Y29" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/iPhone 16 Pro.png" alt="Smartphone iPhone 16 Pro" loading="lazy">
      <h3>iPhone 16 Pro</h3> <p>Kamera profesional dalam genggaman</p>
      <a href="detail.php?id=iPhone-16-Pro" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="hp">
      <img src="images/iPhone 16.png" alt="Smartphone iPhone 16" loading="lazy">
      <h3>iPhone 16</h3>
      <p>Potret hidupmu dalam kualitas tertinggi</p>
      <a href="detail.php?id=iPhone-16" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ASUS Vivobook 14 (A1407).jpg" alt="Laptop ASUS Vivobook 14 (A1407)" loading="lazy">
      <h3>ASUS Vivobook 14 (A1407)</h3>
      <p>Kreatif tanpa batas, dengan kamera sekelas flagship</p>
      <a href="detail.php?id=ASUS-Vivobook-14-A1407" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ROG Zephyrus G14 (GA403).jpg" alt="Laptop ROG Zephyrus G14 (GA403)" loading="lazy">
      <h3>ROG Zephyrus G14 (GA403)</h3>
      <p>Jepret. Edit. Bagikan. Tanpa batas</p>
      <a href="detail.php?id=ROG-Zephyrus-G14-GA403" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ASUS TUF Gaming A14 (FA401).jpg" alt="Laptop ASUS TUF Gaming A14 (FA401)" loading="lazy">
      <h3>ASUS TUF Gaming A14 (FA401)</h3>
      <p>Tunjukkan dunia dari perspektifmu</p>
      <a href="detail.php?id=ASUS-TUF-Gaming-A14-FA401" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/Vivobook S14 (S3407CA).jpg" alt="Laptop Vivobook S14 (S3407CA)" loading="lazy">
      <h3>Vivobook S14 (S3407CA)</h3> <p>Detail yang hidup, warna yang nyata</p>
      <a href="detail.php?id=Vivobook-S14-S3407CA" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ROG Strix G16 (G614).jpg" alt="Laptop ROG Strix G16 (G614)" loading="lazy">
      <h3>ROG Strix G16 (G614)</h3>
      <p>Setiap foto, penuh cerita</p>
      <a href="detail.php?id=ROG-Strix-G16-G614" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ASUS ExpertBook P3 (P3405).jpg" alt="Laptop ASUS ExpertBook P3 (P3405)" loading="lazy">
      <h3>ASUS ExpertBook P3 (P3405)</h3>
      <p>Nyaman digunakan, tenang dalam hati</p>
      <a href="detail.php?id=ASUS-ExpertBook-P3-P3405" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ROG Strix SCAR 18 (G835).jpg" alt="Laptop ROG Strix SCAR 18 (G835)" loading="lazy">
      <h3>ROG Strix SCAR 18 (G835)</h3>
      <p>Smart & secure, tanpa kompromi</p>
      <a href="detail.php?id=ROG-Strix-SCAR-18-G835" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ROG Flow Z13.jpg" alt="Laptop ROG Flow Z13" loading="lazy">
      <h3>ROG Flow Z13</h3>
      <p>Temukan definisi baru dari smartphone premium</p>
      <a href="detail.php?id=ROG-Flow-Z13" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="laptop">
      <img src="images/ExpertBook P5 (P5405).jpg" alt="Laptop ExpertBook P5 (P5405)" loading="lazy">
      <h3>ExpertBook P5 (P5405)</h3>
      <p>Pilihan tepat untuk mereka yang tahu kualitas</p>
      <a href="detail.php?id=ExpertBook-P5-P5405" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/TWS 2 ANC.png" alt="Headset TWS 2 ANC" loading="lazy">
      <h3>TWS 2 ANC</h3>
      <p>Karena TWS juga butuh outfit.</p>
      <a href="detail.php?id=TWS-2-ANC" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/TWS 2e.png" alt="Headset TWS 2e" loading="lazy">
      <h3>TWS 2e</h3>
      <p>Fashionable sampai ke detail kecil</p>
      <a href="detail.php?id=TWS-2e" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/TWS 3e.png" alt="Headset TWS 3e" loading="lazy">
      <h3>TWS 3e</h3>
      <p>Percantik TWS, percantik harimu</p>
      <a href="detail.php?id=TWS-3e" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/TWS Neo.jpg" alt="Headset TWS Neo" loading="lazy">
      <h3>TWS Neo</h3>
      <p>Tampil beda, mulai dari TWS kamu</p>
      <a href="detail.php?id=TWS-Neo" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/Watch 3.png" alt="Smartwatch Watch 3" loading="lazy">
      <h3>Watch 3</h3>
      <p>Biar kecil, tampilannya harus maksimal!</p>
      <a href="detail.php?id=Watch-3" class="btn">Baca Selengkapnya</a>
    </div>

    <div class="card" data-kategori="aksesoris">
      <img src="images/Watch GT.png" alt="Smartwatch Watch GT" loading="lazy">
      <h3>Watch GT</h3>
      <p>TWS keren, tampil makin kece!</p>
      <a href="detail.php?id=Watch-GT" class="btn">Baca Selengkapnya</a>
    </div>
  </section>

  <section id="user-reviews" class="container">
  <h2>Ulasan Pengguna</h2>
  <form id="reviewForm" action="simpan_review.php" method="POST" style="margin-bottom: 30px;">
    <label for="username">Nama:</label>
    <input type="text" id="username" name="username" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

    <label for="rating">Rating (1-5):</label>
    <select id="rating" name="rating" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
      <option value="">Pilih Rating</option>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>

    <label for="comment">Komentar:</label>
    <textarea id="comment" name="comment" rows="3" required style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea>

    <button type="submit" style="padding: 10px 20px;">Kirim</button>
  </form>

  <div id="reviewList">
    <?php
    $result = mysqli_query($koneksi, "SELECT * FROM reviews ORDER BY id DESC");
    while ($review = mysqli_fetch_assoc($result)) {
      echo "<div class='review-item' style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
      echo "<strong>" . htmlspecialchars($review['username']) . "</strong> - " . str_repeat("⭐", $review['rating']) . "<br/>";
      echo "<p>" . htmlspecialchars($review['comment']) . "</p>";
      echo "</div>";
    }
    ?>
  </div>
</section>

  <footer>
    <div class="container">
      <p>© 2025 Review Gadget. All rights reserved.</p>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>