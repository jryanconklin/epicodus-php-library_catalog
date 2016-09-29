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
            $GLOBALS['DB']->exec("INSERT INTO checkouts (status, due_date, patron_id, copy_id)
            VALUES ('{$this->status}', '{$this->due_date}', {$this->patron_id}, {$this->copy_id});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE checkouts SET status = '{$this->status}', due_date = '{$this->due_date}' WHERE id = {$this->id};");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM checkouts WHERE id = {$this->id};");
        }


//Static Methods
        static function getAll()
        {
            $allCheckouts = array();
            $checkouts = $GLOBALS['DB']->query("SELECT * FROM checkouts;");
            foreach($checkouts as $checkout) {
                $id = $checkout['id'];
                $patron_id = $checkout['patron_id'];
                $copy_id = $checkout['copy_id'];
                $due_date = $checkout['due_date'];
                $status = $checkout['status'];
                $new_checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
                array_push($allCheckouts, $new_checkout);
            }
            return $allCheckouts;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM checkouts");
        }

        static function findById($search_id)
        {
            $checkouts = Checkout::getAll();
            foreach($checkouts as $checkout) {
                if ($checkout->getId() == $search_id) {
                    return $checkout;
                }
            }
        }

        // LAST BUT NOT LEAST
        static function getAllOverdueBooks()
        {

        }

//End Class
    }
?>
