<?php

    class Book
    {
//Properties
        private $id;
        private $title;
        private $genre;

//Constructor
        function __construct($title, $genre, $id = null)
        {
            $this->title = $title;
            $this->genre = $genre;
            $this->id = $id;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getTitle()
        {
            return $this->title;
        }

        function getGenre()
        {
            return $this->genre;
        }

        function setTitle($new_title)
        {
            $this->title = $new_title;
        }

        function setGenre($new_genre)
        {
            $this->genre = $new_genre;
        }

//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec(
                    "INSERT INTO books (title, genre)
                    VALUES ('{$this->title}', '{$this->genre}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE books SET title = '{$this->title}', genre = '{$this->genre}' WHERE id = {$this->id} ;");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM books WHERE id = {$this->id};");
        }

        function addtoAuthorsList()
        {

        }
        function deleteFromAuthorsList()
        {

        }

        function getAuthorsList()
        {

        }

        function deleteAllAuthorsList()
        {

        }


//Static Methods
        static function getAll()
        {
            $all_books = array();
            $books = $GLOBALS['DB']->query("SELECT * FROM books;");
            foreach($books as $book) {
                $id = $book['id'];
                $title = $book['title'];
                $genre = $book['genre'];
                $new_book = new Book($title, $genre, $id);
                array_push($all_books, $new_book);
            }
            return $all_books;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM books");
        }

        static function findById($search_id)
        {
            $books = Book::getAll();
            foreach ($books as $book) {
                if ($book->getId() == $search_id) {
                    return $book;
                }
            }
        }


//End Class
    }
?>
