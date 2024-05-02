<?php
class Book {
    public $title;
    public $author;

    public function __construct($title, $author) {
        if (!is_string($title) || !is_string($author)) {
            throw new InvalidArgumentException("Judul dan penulis harus berupa string.");
        }

        $this->title = $title;
        $this->author = $author;
    }
}
?>
