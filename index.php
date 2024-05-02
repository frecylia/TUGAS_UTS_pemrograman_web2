<!-- Di dalam body -->
<h2>Cari Buku</h2>
<form action="" method="GET">
    <label for="searchTitle">Judul Buku:</label>
    <input type="text" id="searchTitle" name="searchTitle" placeholder="Masukkan judul buku">
    <button type="submit">Cari</button>
</form>

<?php
// Di dalam PHP section setelah membuat objek Library
if (isset($_GET['searchTitle'])) {
    $searchedBook = $library->searchBook($_GET['searchTitle']);
    if ($searchedBook) {
        echo "<p>Buku ditemukan: " . $searchedBook->title . " oleh " . $searchedBook->author . "</p>";
    } else {
        echo "<p>Buku tidak ditemukan.</p>";
    }
}
?>

<h2>Pinjam Buku</h2>
<form action="" method="POST">
    <label for="borrowTitle">Judul Buku:</label>
    <input type="text" id="borrowTitle" name="borrowTitle" placeholder="Masukkan judul buku">
    <label for="borrowerName">Nama Peminjam:</label>
    <input type="text" id="borrowerName" name="borrowerName" placeholder="Masukkan nama peminjam">
    <label for="returnDate">Tanggal Pengembalian:</label>
    <input type="date" id="returnDate" name="returnDate">
    <button type="submit">Pinjam</button>
</form>

<?php
// Di dalam PHP section setelah membuat objek Library
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $borrowTitle = $_POST['borrowTitle'];
    $borrowerName = $_POST['borrowerName'];
    $returnDate = $_POST['returnDate'];

    $bookToBorrow = $library->searchBook($borrowTitle);
    if ($bookToBorrow) {
        $library->borrowBook($bookToBorrow, $borrowerName, $returnDate);
        echo "<p>Buku berhasil dipinjam oleh $borrowerName. Harap kembalikan pada tanggal $returnDate.</p>";
    } else {
        echo "<p>Buku tidak tersedia untuk dipinjam.</p>";
    }
}
?>

<h2>Hapus Buku</h2>
<form action="" method="POST">
    <label for="removeTitle">Judul Buku:</label>
    <input type="text" id="removeTitle" name="removeTitle" placeholder="Masukkan judul buku">
    <button type="submit">Hapus</button>
</form>

<?php
// Di dalam PHP section setelah membuat objek Library
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $removeTitle = $_POST['removeTitle'];

    if ($library->removeBook($removeTitle)) {
        echo "<p>Buku berhasil dihapus dari perpustakaan.</p>";
    } else {
        echo "<p>Buku tidak ditemukan dalam perpustakaan.</p>";
    }
}
?>

<h2>Denda Keterlambatan</h2>
<form action="" method="GET">
    <label for="returnDate">Tanggal Pengembalian:</label>
    <input type="date" id="returnDate" name="returnDate">
    <button type="submit">Hitung Denda</button>
</form>

<?php
// Di dalam PHP section setelah membuat objek Library
if (isset($_GET['returnDate'])) {
    $lateFee = $library->calculateLateFee($_GET['returnDate']);
    echo "<p>Denda keterlambatan: $lateFee</p>";
}
?>

