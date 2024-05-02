<?php
class LibraryManager {
    private $library;

    public function __construct($library) {
        if (!$library instanceof Library) {
            throw new InvalidArgumentException("Objek harus merupakan instance dari kelas Library.");
        }
        $this->library = $library;
    }

    public function searchBook($title) {
        $result = [];
        foreach ($this->library->getBooks() as $book) {
            if (stripos($book->title, $title) !== false) {
                $result[] = $book;
            }
        }
        return $result;
    }

    public function setBorrowLimit($days) {
        if (!is_int($days) || $days <= 0) {
            throw new InvalidArgumentException("Batas peminjaman harus berupa bilangan bulat positif.");
        }
        $this->library->setBorrowLimit($days);
    }

    public function getBorrowLimit() {
        return $this->library->getBorrowLimit();
    }

    public function calculateLateFee($dueDate) {
        $borrowLimit = $this->library->getBorrowLimit();
        $today = new DateTime();
        $dueDateObj = new DateTime($dueDate);
        $interval = $today->diff($dueDateObj);
        $daysLate = $interval->format('%r%a');
        if ($daysLate > 0) {
            $lateFee = $daysLate * $this->library->getLateFeeRate();
            return $lateFee;
        }
        return 0;
    }

    public function removeBook($title) {
        return $this->library->removeBook($title);
    }
}
?>
