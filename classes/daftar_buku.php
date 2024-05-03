<?php

$books = array(
    array(
        "judul" => "Harry Potter and the Philosopher's Stone",
        "penulis" => "J.K. Rowling",
        "tahun" => 1997
    ),
    array(
        "judul" => "To Kill a Mockingbird",
        "penulis" => "Harper Lee",
        "tahun" => 1960
    ),
    array(
        "judul" => "The Great Gatsby",
        "penulis" => "F. Scott Fitzgerald",
        "tahun" => 1925
    ),
    array(
        "judul" => "1984",
        "penulis" => "George Orwell",
        "tahun" => 1949
    )
);

// Menampilkan data buku
echo "Daftar Buku:\n";
foreach ($books as $book) {
    echo "Judul: " . $book['judul'] . ", Penulis: " . $book['penulis'] . ", Tahun Terbit: " . $book['tahun'] . "\n";
}
?>
