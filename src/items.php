<?php


readonly class Item
{
    // Creating properties
    public int $id;
    public string $name;
    public float $price;
    public string $image;
    public int $manufacturer_id;

    // Constructor to allow me to pass the data in with instantiation of a new Item
    public function __construct(
        int $id, 
        string $name, 
        float $price, 
        string $image, 
        int $manufacturer_id
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->manufacturer_id = $manufacturer_id;
    }
}