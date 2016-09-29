<?php

    class Checkout
    {
//Properties
        private $id;
        private $patron_id;
        private $copy_id;
        private $status;
        private $due_date;

//Constructor
        function __construct($status, $due_date, $patron_id, $copy_id, $id = null)
        {
            $this->id = $id;
            $this->patron_id = $patron_id;
            $this->copy_id = $copy_id;
            $this->status = $status;
            $this->due_date = $due_date;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getPatronId()
        {
            return $this->patron_id;
        }

        function getCopyId()
        {
            return $this->copy_id;
        }

        function getStatus()
        {
            return $this->status;
        }

        function getDueDate()
        {
            return $this->due_date;
        }

        function setStatus($new_status)
        {
            $this->status = (string) $new_status;
        }

        function setDueDate($new_due_date)
        {
            $this->due_date = (string) $new_due_date;
        }

//Regular Methods
        function save()
        {

        }

        function update()
        {

        }

        function delete()
        {

        }


//Static Methods
        static function getAll()
        {

        }

        static function deleteAll()
        {

        }

        static function findById()
        {

        }


//End Class
    }
?>
