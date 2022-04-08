<?php
/*
 * Author: Kylee Dicken
 * Date: 3/31/2022
 * Name: guest_model.class.php
 * Description: home index page
 */

class GuestModel
{
    private $db;    //database object
    private $dbConnection;  //database connection object

    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    /*
     * this method retrieves all toys from the database and
     * returns an array of Toy objects if successful or false if failed.
     */
    public function getGuests() {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getGuestTable();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all guests
            $guests = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $guest = new Guest($query_row["first_name"],
                    $query_row["last_name"],
                    $query_row["birth_date"],
                    $query_row["email"]);

                //push the toy into the array
                $guests[] = $guest;
            }
            return $guests;
        }
        return false;
    }
}