<?php

    class Copy
    {
//Properties
        private $id;
        private $available;
        private $book_id;

//Constructor
        function __construct($available = true, $book_id = null, $id = null)
        {
            $this->available = $available;
            $this->book_id = $book_id;
            $this->id = $id;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getAvailable()
        {
            return $this->available;
        }

        function getBookId()
        {
            return $this->book_id;
        }

        function setAvailable($new_available)
        {
            $this->available = (boolean) $new_available;
        }

//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO copies (available, book_Id) VALUES ({$this->available}, {$this->book_id});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $available = (integer) $this->available;
            $GLOBALS['DB']->exec("UPDATE copies SET available = {$available} WHERE id = {$this->id};");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM copies WHERE id = {$this->getId()};");
        }

        function addToPatronsList()
        {

        }

        function deleteFromPatronsList()
        {

        }

        function getPatronsList()
        {

        }

        function deleteAllPatronsList()
        {

        }



//Static Methods
        static function getAll()
        {
            $returned_copies = array();
            $copies = $GLOBALS['DB']->query("SELECT * FROM copies;");
            foreach($copies as $copy) {
                $available = (boolean) $copy['available'];
                $book_id = $copy['book_id'];
                $id = $copy['id'];
                $new_copy = new Copy($available, $book_id, $id);
                array_push($returned_copies, $new_copy);
            }
            return $returned_copies;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM copies;");
        }

        static function findById($search_id)
        {
            $copies = Copy::getAll();
            foreach($copies as $copy){
                if ($copy->getId() == $search_id) {
                    return $copy;
                }
            }
        }


//End Class
    }
?>
