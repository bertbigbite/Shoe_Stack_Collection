<?php


readonly class Item
{
    // Creating properties
    public int $id;
    public string $name;
    public float $price;
    public string $image;
    public string $manufacturer;

    // Constructor to allow me to pass the data in with instantiation of a new Item
    public function __construct(
        int $id, 
        string $name, 
        float $price, 
        string $image, 
        string $manufacturer
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->manufacturer = $manufacturer;
    }
}