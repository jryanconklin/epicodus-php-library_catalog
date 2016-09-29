<?php

    class Patron
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
            $this->name = (string) $new_name;
        }

//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO patrons (name) VALUES ('{$this->name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE patrons SET name = '{$this->name}' WHERE id = {$this->id};");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM patrons WHERE id = {$this->id};");
        }

        function getCopyList()
        {
            // Returns the Copies List by Patron
            $results = $GLOBALS['DB']->query(
            "SELECT copies.id FROM copies
                JOIN checkouts ON (copies.id = checkouts.copy_id)
                JOIN patrons ON (checkouts.patron_id = patrons.id)
            WHERE patrons.id = {$this->id};");
            $copy_list = array();
            foreach($results as $result) {
                $new_copy = Copy::findById($result['id']);
                array_push($copy_list, $new_copy);
            }
            return $copy_list;
        }

        function checkoutBook($copy)
        {
            //Validate Copy of Book is Available and Check Out
            $available = $copy->getAvailable();
            if ($available) {
                $status = "CHECKED OUT";
            } else {
                return "UNAVAILABLE";
            }

            //Take Today's Date, Add 14 Days for Due Date
            $today = date('Y:m:d');
            $due_date = Date('Y:m:d', strtotime("+14 days"));

            //Add Copy of Book Checked Out by Patron to Checkouts Table
            $GLOBALS['DB']->exec("INSERT INTO checkouts (patron_id, copy_id, due_date, status) VALUES ({$this->id}, {$copy->getId()}, '{$due_date}', '{$status}');");

            //Set the Copy of the Book's Availability to False
            $copy->setAvailable(false);
        }

        function deleteFromCopyList($copy)
        {
            // deletes a patron from the copy list
            $GLOBALS['DB']->exec("DELETE FROM checkouts WHERE patron_id = {$this->id} AND copy_id = {$copy->getId()};");
        }

        function deleteAllCopyList()
        {
            $GLOBALS['DB']->exec("DELETE FROM checkouts WHERE patron_id = {$this->id};");
        }



//Static Methods
        static function getAll()
        {
            $all_patrons = array();
            $patrons = $GLOBALS['DB']->query("SELECT * FROM patrons;");
            foreach($patrons as $patron){
                $id = $patron['id'];
                $name = $patron['name'];
                $new_patron = new Patron($name, $id);
                array_push($all_patrons, $new_patron);
            }
            return $all_patrons;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM patrons;");
        }

        static function findById($search_id)
        {
            $patrons = Patron::getAll();
            foreach($patrons as $patron) {
                if ($patron->getId() == $search_id) {
                    return $patron;
                }
            }
        }



//End Class
    }
?>
