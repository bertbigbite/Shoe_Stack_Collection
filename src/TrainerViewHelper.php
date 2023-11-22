<?php

require_once 'src/Trainers.php';

class TrainerViewHelper
{
    
    public static function displaySingleItem (Trainer $item): string
    {
        $output = '<div>';
        $output .= "<h1>$item->name</h1>";
        $output .= "<p>$item->manufacturer</p>";
        $output .= "<img src='$item->image' />";
        $output .= "<p>£$item->price</p>";
        $output .= '</div>';

        return $output;
    }

    public static function displayAllItems(array $items): string
    {
        // Create an variable with an empty string
        $output = '';
        // Loop through each product to generate each products HTML one at a time
        foreach ($items as $item) {
            // Use '.=' to append the variable, with all of the data from each product, to build up into a single variable 
            $output .= '<div class = "itemdisplay">';
            $output .= "<h1>$item->name</h1>";
            $output .= "<img src='$item->image' />";
            $output .= "<p>$item->manufacturer</p>";
            $output .= "<p>£$item->price</p>";
            $output .= '</div>';
        }

        return $output;
    }

    

}