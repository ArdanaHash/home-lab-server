<!DOCTYPE html>
<html>
<head>
    <title>Lab XSS - Ardana</title>
</head>
<body>
    <h1>Fitur Pencarian Artikel</h1>

    <!-- Form Input -->
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari sesuatu..." required>
        <button type="submit">Cari</button>
    </form>

    <hr>

    <?php
    // Mengambil input dari kolom pencarian URL (?search=...)
    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];

        // KODE RENTAN: Menampilkan kembali apa pun yang diketik user tanpa filter/sanitisasi!
	$safe_keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

        echo "<h3>Hasil pencarian untuk: " . $safe_keyword . "</h3>";
        echo "<p>Maaf, artikel tentang '" . $safe_keyword . "' tidak ditemukan.</p>";
    }
    ?>
</body>
</html>
