<?php
class Library {
    private $books = [];
    private $borrowedBooks = [];

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function displayBooks() {
        foreach ($this->books as $book) {
            echo "<div>Title: " . $book->title . ", Author: " . $book->author . "</div>";
        }
    }

    public function searchBook($title) {
        foreach ($this->books as $book) {
            if (strtolower($book->title) === strtolower($title)) {
                return $book;
            }
        }
        return null;
    }

    public function borrowBook($book, $borrower, $returnDate) {
        $this->borrowedBooks[] = [
            'book' => $book,
            'borrower' => $borrower,
            'returnDate' => $returnDate
        ];
    }

    public function calculateLateFee($returnDate) {
        $dueDate = strtotime($returnDate);
        $today = time();
        $daysLate = ($today - $dueDate) / (60 * 60 * 24);
        if ($daysLate > 0) {
            return $daysLate * 0.5; // Set denda per hari keterlambatan
        } else {
            return 0;
        }
    }

    public function removeBook($title) {
        foreach ($this->books as $key => $book) {
            if (strtolower($book->title) === strtolower($title)) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }
}
?>
