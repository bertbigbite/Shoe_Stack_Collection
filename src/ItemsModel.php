<?php

require_once 'src/Items.php';


class ItemsModel
{
    public PDO $db;
    
    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    // Get all items from the database
    public function getAllItems()
    {
        // Fetch the data providing the parameters in the SQL statement
        $query = $this->db->prepare('SELECT * FROM `trainers`');
        $query->execute();
        $items = $query->fetchAll();

        $itemObject = []; // Create a new empty array to contain the objects
        // For each item in the result of the fetch, create an Item object and put it into an array
        foreach ($items as $item) {
            $itemObject [] = new Item(
                $item['id'], 
                $item['name'], 
                $item['price'],
                $item['image'],
                $item['manufacturer_id']
            );
        }
        // Return the array of Item objects
        return $itemObject;
    }

}