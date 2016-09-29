<?php

    class Author
    {
//Properties
        private $id;
        private $name;

//Constructor
        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO authors (name) VALUES ('{$this->name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE authors SET name = '{$this->name}' WHERE id = {$this->id};");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM authors WHERE id = {$this->id};");
        }

        function addToBooksList()
        {

        }

        function deleteFromBooksList()
        {

        }

        function getBooksList()
        {

        }

        function deleteAllBooksList()
        {

        }

//Static Methods
        static function getAll()
        {
            $all_authors = array();
            $authors = $GLOBALS['DB']->query("SELECT * FROM authors;");
            foreach($authors as $author){
                $id = $author['id'];
                $name = $author['name'];
                $new_author = new Author($name, $id);
                array_push($all_authors, $new_author);
            }
            return $all_authors;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM authors;");
        }

        static function findById($search_id)
        {
            $authors = Author::getAll();
            foreach($authors as $author) {
                if ($author->getId() == $search_id) {
                    return $author;
                }
            }
        }



//End Class
    }
?>
