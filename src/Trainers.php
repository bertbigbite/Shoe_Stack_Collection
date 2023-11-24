<?php


readonly class Trainer
{
    // Creating properties
    public int $id;
    public string $name;
    public float $price;
    public string $image;
    public string $manufacturer;
    public int $deleted;
    public string $description;
    public string $colour;

    // Constructor to allow me to pass the data in with instantiation of a new Item
    public function __construct(
        int $id,
        string $name,
        float $price,
        string $image,
        string $manufacturer,
        int $deleted,
        string $description,
        string $colour,

    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->manufacturer = $manufacturer;
        $this->deleted = $deleted;
        $this->description = $description;
        $this->colour = $colour;
    }
}