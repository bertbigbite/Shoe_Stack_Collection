<?php

require_once 'src/Trainers.php';

class TrainerViewHelper
{
    
    public static function displaySingleItem (Trainer $item): string
    {
        $output = '<div class = "container">';
        $output .= "<img class = 'containerimage shadow-lg' src='$item->image' />";
        $output .= '<div class = "singleitemdisplay">';
        $output .= "<h1><strong>Name</strong></h1>";
        $output .= "<p>$item->name</p>";
        $output .= "<h1><strong>Brand</strong></h1>";
        $output .= "<p>$item->manufacturer</p>";
        $output .= "<h1><strong>Primary Colour</strong></h1>";
        $output .= "<p>$item->colour</p>";
        $output .= "<h1><strong>Price</strong></h1>";
        $output .= "<p>£$item->price</p>";
        $output .= "<h1><strong>Description</strong></h1>";
        $output .= "<p>$item->description</p>";
        $output .= '<form method="POST">';
        $output .= "<input type='hidden' name='id_to_delete' value='$item->id'>";
        $output .= '<input type="submit" name="delete" value="Delete" class="bg-amber-500 shadow-lg cursor-pointer px-2 py-1 rounded hover:bg-black hover:text-white">';
        $output .= '</form>';
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
            $output .= "<p><strong>$item->manufacturer</strong></p>";
            $output .= "<img class ='shadow-lg' src='$item->image' />";
            $output .= "<h1><strong>$item->name</strong></h1>";
            $output .= "<p>£$item->price</p>";
            $output .= "<br>";
            $output .= "<a class='bg-amber-500 shadow-lg cursor-pointer px-2 py-1 rounded hover:bg-black hover:text-white itembutton' href='details.php?get_id={$item->id}'>More info</a>";
            $output .= '</div>';
        }
        
        return $output;
    }


}