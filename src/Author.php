<?php

    class Author
    {
//Properties
    private $id;
    private $name;

//Constructor
    function __construct($id = null, $name)
    {
        $this->id = $id;
        $this->name = $name;
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

    }

    function delete()
    {

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
            $new_author = new Author($id, $name);
            array_push($all_authors, $new_author);
        }
        return $all_authors;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM authors;");
    }

    static function findById()
    {

    }



//End Class
    }
?>
