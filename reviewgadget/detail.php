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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>

        .detail-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }

        .detail-card h2 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 15px;
        }

        .detail-card .detail-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .detail-card .detail-description {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 20px;
        }

        .detail-card .full-review {
            font-size: 1em;
            color: #666;
            line-height: 1.6;
            text-align: left;
            margin-bottom: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .detail-card .detail-category {
            font-weight: 600;
            color: #007bff;
        }

        #not-found-message {
            text-align: center;
            color: red;
            font-weight: bold;
            font-size: 1.5em;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Detail Produk</h1>
            <nav>
                <ul>
                    <li><a href="index.php">← Kembali ke Beranda</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <main class="container detail-content">
        <div id="product-detail">
            <p id="not-found-message" style="display: none;">Produk tidak ditemukan.</p>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>© 2025 Review Gadget. All rights reserved.</p>
        </div>
    </footer>

    <script>
  
        const products = [
            {
                id: 'v40-lite-5g',
                name: 'V40 Lite 5G',
                category: 'hp',
                image: 'images/V40 Lite 5G.png',
                description: 'Performa tinggi, kamera luar biasa, dan desain premium. Layak dibeli?',
                full_review: 'V40 Lite 5G adalah smartphone yang dirancang untuk mereka yang menginginkan performa terbaik tanpa menguras kantong. Ditenagai oleh prosesor terbaru, ponsel ini mampu menangani game berat dan aplikasi multitasking dengan mulus. Kamera utamanya menghasilkan foto-foto yang menakjubkan bahkan dalam kondisi cahaya rendah, dan baterainya tahan lama untuk penggunaan sepanjang hari. Desainnya yang ramping dan material premium memberikan kesan mewah saat digenggam.'
            },
            {
                id: 'v50-5g',
                name: 'V50 5G',
                category: 'hp',
                image: 'images/V50 5G.png',
                description: 'Elegan dalam genggaman',
                full_review: 'V50 5G bukan hanya tentang spesifikasi, tetapi juga tentang pengalaman. Dengan desain yang sangat tipis dan ringan, ia terasa nyaman di tangan. Layar AMOLED-nya menawarkan warna yang hidup dan kontras yang tajam, sempurna untuk menonton video atau menjelajahi media sosial. Konektivitas 5G memastikan kecepatan unduh dan unggah yang super cepat. Ini adalah pilihan ideal bagi mereka yang mencari kombinasi sempurna antara gaya dan substansi.'
            },
            {
                id: 'v50-lite-5g',
                name: 'V50 Lite 5G',
                category: 'hp',
                image: 'images/V50 Lite 5G.png',
                description: 'Bukan sekadar ponsel, ini adalah pernyataan gaya',
                full_review: 'V50 Lite 5G hadir dengan tampilan yang berani dan pilihan warna yang menarik. Bodinya yang ergonomis membuatnya mudah digunakan dengan satu tangan, sementara chipset 5G yang efisien memastikan koneksi yang stabil dan cepat. Cocok untuk para profesional muda dan penggemar teknologi yang ingin perangkat yang tidak hanya berfungsi dengan baik tetapi juga mencerminkan kepribadian mereka.'
            },
            {
                id: 'v50-lite',
                name: 'V50 Lite',
                category: 'hp',
                image: 'images/V50 Lite.png',
                description: 'Kekuatan sejati, hadir tanpa kompromi',
                full_review: 'Jika Anda mencari ponsel yang tangguh dan dapat diandalkan, V50 Lite adalah jawabannya. Meskipun disebut "Lite", performanya tidak main-main. Baterai berkapasitas besar memastikan Anda tetap terhubung sepanjang hari, dan antarmuka penggunanya yang intuitif membuat navigasi menjadi mudah. Ini adalah perangkat yang dirancang untuk produktivitas dan hiburan tanpa hambatan.'
            },
            {
                id: 'x-fold3-pro',
                name: 'X Fold3 Pro',
                category: 'hp',
                image: 'images/X Fold3 Pro.png',
                description: 'Dari multitasking hingga gaming, semuanya mulus',
                full_review: 'X Fold3 Pro mendefinisikan ulang apa yang bisa dilakukan sebuah smartphone. Layar lipatnya yang inovatif memungkinkan Anda beralih antara mode ponsel dan tablet dengan mulus, sempurna untuk multitasking atau menikmati konten. Ditenagai oleh chip kelas atas, performanya tak tertandingi. Sistem kameranya yang canggih menangkap setiap momen dengan detail luar biasa. Ini adalah perangkat premium untuk pengguna paling menuntut.'
            },
            {
                id: 'x100-pro',
                name: 'X100 Pro',
                category: 'hp',
                image: 'images/X100 Pro.png',
                description: 'Teknologi biometrik untuk perlindungan maksimal',
                full_review: 'X100 Pro menggabungkan keamanan canggih dengan performa luar biasa. Sensor sidik jari di layar dan fitur pengenalan wajah memberikan keamanan tingkat tinggi untuk data pribadi Anda. Kamera yang dioptimalkan AI menghasilkan foto-foto yang memukau, sementara layar resolusi tinggi menawarkan pengalaman visual yang imersif. Ideal untuk mereka yang memprioritaskan privasi dan teknologi mutakhir.'
            },
            {
                id: 'x200-pro',
                name: 'X200 Pro',
                category: 'hp',
                image: 'images/X200 Pro.png',
                description: 'Teknologi tinggi, tampilan elegan',
                full_review: 'X200 Pro adalah perpaduan sempurna antara kekuatan dan keindahan. Bodinya yang ramping dan material premium memberikan sentuhan kemewahan. Di dalamnya, prosesor canggih memastikan kinerja yang responsif untuk segala kebutuhan. Layar tepi melengkung menampilkan visual yang menawan, menjadikannya pilihan yang tepat bagi pengguna yang menghargai estetika dan fungsionalitas.'
            },
            {
                id: 'x200',
                name: 'X200',
                category: 'hp',
                image: 'images/X200.png',
                description: 'Genggam kemewahan dalam bentuk teknologi',
                full_review: 'X200 menawarkan pengalaman smartphone premium dengan harga yang lebih terjangkau. Desainnya yang ramping dan ergonomis terasa nyaman di tangan. Kamera berkualitas tinggi memungkinkan Anda mengabadikan momen-momen penting dengan jelas. Ini adalah pilihan yang solid bagi mereka yang menginginkan fitur-fitur flagship tanpa label harga yang mahal.'
            },
            {
                id: 'y19s-pro',
                name: 'Y19s Pro',
                category: 'hp',
                image: 'images/Y19s Pro.png',
                description: 'Estetika dan performa, berpadu sempurna',
                full_review: 'Y19s Pro adalah perangkat yang seimbang sempurna antara desain yang memukau dan kinerja yang andal. Dengan pilihan warna yang trendi dan bodi yang tipis, ia menonjol dari keramaian. Di bawah kap, chipset yang efisien memastikan pengoperasian yang lancar untuk aplikasi sehari-hari dan hiburan. Kamera AI-nya menghasilkan foto-foto yang menarik perhatian di media sosial.'
            },
            {
                id: 'y19s',
                name: 'Y19s',
                category: 'hp',
                image: 'images/Y19s.png',
                description: 'Performa optimal untuk kebutuhan sehari-hari Anda.', // Deskripsi ditambahkan
                full_review: 'Y19s dirancang untuk penggunaan sehari-hari yang efisien. Baterai yang tahan lama memastikan Anda tetap terhubung, sementara layar yang cerah dan jernih membuat konsumsi konten menjadi menyenangkan. Kamera yang mumpuni memungkinkan Anda mengabadikan momen dengan mudah. Ini adalah pilihan praktis dan handal untuk setiap pengguna.'
            },
            {
                id: 'y19sgt-5g', // ID yang dinormalisasi
                name: 'Y19sGT 5G',
                category: 'hp',
                image: 'images/Y19sGT 5G.png',
                description: 'Wujudkan kesempurnaan dalam setiap detail',
                full_review: 'Y19sGT 5G membawa Anda ke level selanjutnya dengan konektivitas ultra-cepat dan performa gaming yang mengagumkan. Desainnya yang agresif mencerminkan kekuatannya di bawah kap. Layar dengan refresh rate tinggi memberikan visual yang sangat halus, dan sistem pendingin canggih menjaga perangkat tetap dingin bahkan di bawah beban berat. Ini adalah smartphone impian para gamer.'
            },
            {
                id: 'y29',
                name: 'Y29',
                category: 'hp',
                image: 'images/Y29.png',
                description: 'Satu sentuhan, ribuan kesan',
                full_review: 'Y29 adalah tentang pengalaman pengguna yang mulus. Antarmuka yang ramah pengguna dan responsif membuat setiap interaksi menyenangkan. Dengan kamera yang ditingkatkan AI, Anda dapat mengambil foto dan video yang jernih dan detail. Desainnya yang minimalis dan pilihan warna yang klasik menjadikannya pilihan yang serbaguna untuk setiap gaya hidup.'
            },
            {
                id: 'iphone-16-pro',
                name: 'iPhone 16 Pro',
                category: 'hp',
                image: 'images/iPhone 16 Pro.png',
                description: 'Kamera profesional dalam genggaman',
                full_review: 'iPhone 16 Pro menetapkan standar baru untuk fotografi seluler. Sistem kamera Pro-nya menghadirkan detail dan warna yang tak tertandingi, bahkan dalam kondisi paling menantang. Chipset bionik terbaru memberikan performa super cepat untuk aplikasi dan game paling menuntut. Desain titanium premium dan layar ProMotion memberikan pengalaman yang imersif dan responsif. Ini adalah perangkat utama bagi para kreator dan profesional.'
            },
            {
                id: 'iphone-16',
                name: 'iPhone 16',
                category: 'hp',
                image: 'images/iPhone 16.png',
                description: 'Potret hidupmu dalam kualitas tertinggi',
                full_review: 'iPhone 16 hadir dengan peningkatan signifikan dalam performa dan kemampuan kamera. Chipset yang ditingkatkan memastikan semua berjalan lancar dan cepat. Sistem kamera ganda menghasilkan foto-foto yang indah dengan mode potret yang ditingkatkan. Desain yang elegan dan daya tahan baterai yang lebih baik menjadikannya pilihan yang fantastis untuk penggunaan sehari-hari.'
            },
            {
                id: 'asus-vivobook-14-a1407',
                name: 'ASUS Vivobook 14 (A1407)',
                category: 'laptop',
                image: 'images/ASUS Vivobook 14 (A1407).jpg',
                description: 'Kreatif tanpa batas, dengan kamera sekelas flagship',
                full_review: 'ASUS Vivobook 14 (A1407) adalah laptop yang ringan dan portabel, sempurna untuk produktivitas saat bepergian. Layar NanoEdge memberikan visual yang luas dan imersif. Dengan prosesor Intel atau AMD terbaru, laptop ini menangani tugas-tugas sehari-hari dengan mudah. Keyboard ergonomis dan daya tahan baterai yang baik menjadikannya teman yang ideal untuk belajar atau bekerja.'
            },
            {
                id: 'rog-zephyrus-g14-ga403',
                name: 'ROG Zephyrus G14 (GA403)',
                category: 'laptop',
                image: 'images/ROG Zephyrus G14 (GA403).jpg',
                description: 'Jepret. Edit. Bagikan. Tanpa batas',
                full_review: 'ROG Zephyrus G14 (GA403) adalah laptop gaming ringkas yang kuat. Dengan desain yang ramping dan performa yang luar biasa berkat GPU NVIDIA GeForce RTX dan prosesor AMD Ryzen, laptop ini dapat menjalankan game AAA terbaru dengan lancar. Layar refresh rate tinggi memastikan pengalaman bermain game yang sangat imersif. Ideal untuk gamer yang selalu bepergian.'
            },
            {
                id: 'asus-tuf-gaming-a14-fa401',
                name: 'ASUS TUF Gaming A14 (FA401)',
                category: 'laptop',
                image: 'images/ASUS TUF Gaming A14 (FA401).jpg',
                description: 'Tunjukkan dunia dari perspektifmu',
                full_review: 'ASUS TUF Gaming A14 (FA401) adalah laptop gaming yang dirancang untuk daya tahan dan performa. Dengan sertifikasi militer MIL-STD-810H, laptop ini tangguh dan siap menghadapi tantangan. Prosesor AMD Ryzen dan GPU NVIDIA GeForce memberikan kekuatan yang cukup untuk game dan tugas berat lainnya. Sistem pendingin yang efisien menjaga performa tetap optimal.'
            },
            {
                id: 'vivobook-s14-s3407ca',
                name: 'Vivobook S14 (S3407CA)',
                category: 'laptop',
                image: 'images/Vivobook S14 (S3407CA).jpg',
                description: 'Detail yang hidup, warna yang nyata',
                full_review: 'Vivobook S14 (S3407CA) menawarkan layar OLED yang menakjubkan dengan warna yang akurat dan kontras yang mendalam, ideal untuk para kreator konten. Bodinya yang ringan dan tipis membuatnya sangat portabel. Ditenagai oleh prosesor Intel Core terbaru, laptop ini memberikan performa yang responsif untuk berbagai aplikasi. Keyboard backlit dan daya tahan baterai yang baik meningkatkan produktivitas.'
            },
            {
                id: 'rog-strix-g16-g614',
                name: 'ROG Strix G16 (G614)',
                category: 'laptop',
                image: 'images/ROG Strix G16 (G614).jpg',
                description: 'Setiap foto, penuh cerita',
                full_review: 'ROG Strix G16 (G614) adalah mesin gaming yang bertenaga dengan layar 16 inci yang imersif. Didukung oleh CPU Intel Core generasi terbaru dan GPU NVIDIA GeForce RTX, laptop ini dirancang untuk performa gaming maksimal. Sistem pendingin cerdas dan keyboard RGB yang dapat disesuaikan memberikan pengalaman bermain game yang superior. Cocok untuk gamer hardcore.'
            },
            {
                id: 'asus-expertbook-p3-p3405',
                name: 'ASUS ExpertBook P3 (P3405)',
                category: 'laptop',
                image: 'images/ASUS ExpertBook P3 (P3405).jpg',
                description: 'Nyaman digunakan, tenang dalam hati',
                full_review: 'ASUS ExpertBook P3 (P3405) adalah laptop bisnis yang tangguh dan aman. Dengan fitur keamanan tingkat enterprise dan bodi yang dirancang untuk daya tahan, laptop ini adalah pilihan yang ideal untuk profesional. Prosesor Intel Core terbaru memastikan performa yang cepat dan efisien. Layar anti-silau dan keyboard yang nyaman mendukung produktivitas sepanjang hari.'
            },
            {
                id: 'rog-strix-scar-18-g835',
                name: 'ROG Strix SCAR 18 (G835)',
                category: 'laptop',
                image: 'images/ROG Strix SCAR 18 (G835).jpg',
                description: 'Smart & secure, tanpa kompromi',
                full_review: 'ROG Strix SCAR 18 (G835) adalah laptop gaming kelas atas dengan layar 18 inci yang masif, menawarkan pengalaman visual yang tak tertandingi. Ditenagai oleh komponen paling kuat dari Intel dan NVIDIA, laptop ini dirancang untuk kinerja ekstrem dan gaming kompetitif. Sistem pendingin canggih menjaga suhu optimal, bahkan saat sesi bermain game maraton. Ini adalah puncak dari teknologi gaming portabel.'
            },
            {
                id: 'rog-flow-z13',
                name: 'ROG Flow Z13',
                category: 'laptop',
                image: 'images/ROG Flow Z13.jpg',
                description: 'Temukan definisi baru dari smartphone premium',
                full_review: 'ROG Flow Z13 adalah tablet gaming inovatif yang dapat berfungsi sebagai laptop gaming yang kuat. Dengan desain yang fleksibel dan kemampuan untuk terhubung ke GPU eksternal, perangkat ini menawarkan performa gaming yang luar biasa dalam format yang portabel. Layar sentuh berkualitas tinggi dan dukungan stylus menjadikannya alat serbaguna untuk gamer dan kreator.'
            },
            {
                id: 'expertbook-p5-p5405',
                name: 'ExpertBook P5 (P5405)',
                category: 'laptop',
                image: 'images/ExpertBook P5 (P5405).jpg',
                description: 'Pilihan tepat untuk mereka yang tahu kualitas',
                full_review: 'ExpertBook P5 (P5405) adalah laptop bisnis premium yang memadukan desain elegan dengan performa luar biasa. Dibuat dengan material berkualitas tinggi dan fitur keamanan canggih, laptop ini dirancang untuk memenuhi kebutuhan profesional paling cerdas. Daya tahan baterai yang luar biasa dan konektivitas yang luas memastikan Anda selalu produktif.'
            },
            {
                id: 'tws-2-anc',
                name: 'TWS 2 ANC',
                category: 'aksesoris',
                image: 'images/TWS 2 ANC.png',
                description: 'Karena TWS juga butuh outfit.',
                full_review: 'TWS 2 ANC menawarkan pengalaman audio yang imersif dengan fitur Active Noise Cancellation (ANC) yang efektif. Desainnya yang ringan dan ergonomis memastikan kenyamanan penggunaan dalam waktu lama. Kualitas suara yang jernih dan bass yang dalam menjadikan setiap lagu terdengar luar biasa. Ideal untuk perjalanan atau saat Anda membutuhkan ketenangan.'
            },
            {
                id: 'tws-2e',
                name: 'TWS 2e',
                category: 'aksesoris',
                image: 'images/TWS 2e.png',
                description: 'Fashionable sampai ke detail kecil',
                full_review: 'TWS 2e adalah pilihan yang stylish dan fungsional untuk kebutuhan audio harian Anda. Dengan desain yang ringkas dan beragam pilihan warna, earbud ini cocok untuk segala gaya. Kualitas suara yang seimbang dan koneksi Bluetooth yang stabil memastikan pengalaman mendengarkan yang menyenangkan, baik untuk musik maupun panggilan telepon.'
            },
            {
                id: 'tws-3e',
                name: 'TWS 3e',
                category: 'aksesoris',
                image: 'images/TWS 3e.png',
                description: 'Percantik TWS, percantik harimu',
                full_review: 'TWS 3e menggabungkan performa audio yang solid dengan desain yang menarik. Earbud ini nyaman digunakan dan memiliki kontrol sentuh yang responsif untuk kemudahan navigasi musik dan panggilan. Kualitas suara yang jernih dan baterai tahan lama menjadikannya pendamping sempurna untuk aktivitas sehari-hari Anda.'
            },
            {
                id: 'tws-neo',
                name: 'TWS Neo',
                category: 'aksesoris',
                image: 'images/TWS Neo.jpg',
                description: 'Tampil beda, mulai dari TWS kamu',
                full_review: 'TWS Neo menonjol dengan desainnya yang unik dan fitur-fitur pintar. Kualitas suara yang ditingkatkan dan latensi rendah membuatnya ideal untuk gaming dan menonton video. Konektivitas yang cepat dan casing pengisi daya yang ringkas menambah kenyamanan dalam penggunaan sehari-hari. Ini adalah pilihan yang sempurna bagi mereka yang ingin berbeda.'
            },
            {
                id: 'watch-3',
                name: 'Watch 3',
                category: 'aksesoris',
                image: 'images/Watch 3.png',
                description: 'Biar kecil, tampilannya harus maksimal!',
                full_review: 'Watch 3 adalah smartwatch yang menggabungkan gaya dan fungsionalitas. Dengan layar AMOLED yang cerah dan berbagai mode pelacakan kebugaran, jam tangan ini membantu Anda tetap aktif dan terhubung. Daya tahan baterai yang lama dan kemampuan untuk menerima notifikasi langsung di pergelangan tangan menjadikannya aksesori yang sangat praktis.'
            },
            {
                id: 'watch-gt',
                name: 'Watch GT',
                category: 'aksesoris',
                image: 'images/Watch GT.png',
                description: 'TWS keren, tampil makin kece!', // Deskripsi ini mungkin lebih cocok untuk TWS, bukan smartwatch. Harap perbaiki jika perlu.
                full_review: 'Watch GT adalah smartwatch yang berfokus pada daya tahan baterai dan pelacakan kebugaran yang akurat. Desainnya yang sporty dan fitur tahan air membuatnya cocok untuk segala aktivitas. Dengan sensor detak jantung dan GPS bawaan, Anda dapat memantau latihan Anda dengan presisi. Ini adalah pilihan yang sangat baik bagi penggemar olahraga dan aktivitas luar ruangan.'
            }
        ];

        // Mengambil parameter ID dari URL
        function getProductIdFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            let id = urlParams.get('id');
            if (id) {
                // Normalisasi ID: ubah spasi menjadi hyphen dan ubah menjadi lowercase
                // Ini penting agar ID yang datang dari URL cocok dengan ID di data produk
                id = id.toLowerCase().replace(/\s+/g, '-');
            }
            return id;
        }

        // Menemukan produk berdasarkan ID
        function findProductById(productId) {
            return products.find(product => product.id === productId);
        }

        // Menampilkan detail produk
        function displayProductDetail(product) {
            const productDetailDiv = document.getElementById('product-detail');
            const notFoundMessage = document.getElementById('not-found-message');

            if (product) {
                // Sembunyikan pesan "tidak ditemukan"
                notFoundMessage.style.display = 'none';

                // Buat elemen HTML untuk menampilkan detail
                productDetailDiv.innerHTML = `
                    <div class="detail-card">
                        <h2>${product.name}</h2>
                        <img src="${product.image}" alt="${product.name}" class="detail-image">
                        <p class="detail-description">${product.description}</p>
                        <p class="full-review">${product.full_review || 'Ulasan lengkap akan segera hadir.'}</p>
                        <p>Kategori: <span class="detail-category">${product.category.charAt(0).toUpperCase() + product.category.slice(1)}</span></p>
                    </div>
                `;
            } else {
                // Tampilkan pesan "produk tidak ditemukan"
                productDetailDiv.innerHTML = ''; // Kosongkan konten sebelumnya
                notFoundMessage.style.display = 'block';
            }
        }

        // Jalankan ketika DOM sudah dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const productId = getProductIdFromUrl();
            const product = findProductById(productId);
            displayProductDetail(product);
        });
    </script>
<section id="user-reviews">
  <h2>Ulasan Pengguna</h2>

  <form action="simpan_review.php" method="POST">
    <input type="hidden" name="produk_id" value="<?php echo $_GET['id']; ?>">

    <label for="username">Nama:</label>
    <input type="text" name="username" required>

    <label for="rating">Rating:</label>
    <select name="rating" required>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>

    <label for="comment">Komentar:</label>
    <textarea name="comment" required></textarea>

    <button type="submit">Kirim</button>
  </form>


    <script>
      const reviewForm = document.getElementById("reviewForm");
      const reviewList = document.getElementById("reviewList");

      reviewForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = document.getElementById("username").value;
        const rating = document.getElementById("rating").value;
        const comment = document.getElementById("comment").value;

        const reviewItem = document.createElement("div");
        reviewItem.className = "review-item";
        reviewItem.innerHTML = `
          <strong>${name}</strong> - ${"⭐".repeat(rating)}<br/>
          <p>${comment}</p>
        `;

        reviewList.prepend(reviewItem);
        reviewForm.reset();
      });
    </script>
  </body>
</html>
