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



//Regular Methods







//Static Methods






//End Class
    }
?>
