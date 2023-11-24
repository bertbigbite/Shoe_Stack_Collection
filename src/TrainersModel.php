<?php

require_once 'src/Trainers.php';


class TrainersModel
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
        $query = $this->db->prepare('SELECT `trainers`.`id`,`trainers`.`name`, `trainers`.`image`,`trainers`.`price`,`trainers`.`deleted`,`trainers`.`description`, `manufacturer`.`name` AS `manufacturer`, `colour`.`name` AS `colour`
                                        FROM `trainers`
                                        INNER JOIN `manufacturer`
                                        ON `trainers`.`manufacturer_id` = `manufacturer`.`id`
                                        INNER JOIN `colour`
                                        ON `trainers`.`colour_id` = `colour`.`id`');
                                        
        $query->execute();
        $items = $query->fetchAll();

        $itemObject = []; 
        foreach ($items as $item) {
            $itemObject [] = new Trainer(
                $item['id'],
                $item['name'],
                $item['price'],
                $item['image'],
                $item['manufacturer'],
                $item['deleted'],
                $item['description'],
                $item['colour'],
            );
        }

        return $itemObject;
    } 
    

    public function getSingleItems($id)
    {

        $query = $this->db->prepare('SELECT `trainers`.`id`,`trainers`.`name`, `trainers`.`image`,`trainers`.`price`,`trainers`.`deleted`,`trainers`.`description`, `manufacturer`.`name` AS `manufacturer`, `colour`.`name` AS `colour`
                                        FROM `trainers`
                                        INNER JOIN `manufacturer`
                                        ON `trainers`.`manufacturer_id` = `manufacturer`.`id`
                                        INNER JOIN `colour`
                                        ON `trainers`.`colour_id` = `colour`.`id`
                                        WHERE `trainers`.`id` = :trainer_id');

        $success = $query->execute([
        ':trainer_id' => $id,
        ]);

        $item = $query->fetch();

            return new Trainer(
                $item['id'], 
                $item['name'], 
                $item['price'],
                $item['image'],
                $item['manufacturer'],
                $item['deleted'],
                $item['description'],
                $item['colour']
            );
        
    }


    public function deleteTrainer($id) {
        $sql = 'DELETE FROM trainers
                WHERE id = :trainer_id';
        
        $query = $this->db->prepare($sql);
        
        return $query->execute([':trainer_id' => $id]);
    }
}


