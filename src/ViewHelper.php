<?php

require_once 'src/Items.php';

class ItemViewHelper
{
    
    public static function displaySingleItem (Item $item): string
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
        $output = '';
        // Because this method is dealing with multiple products, we need to loop through
        // them to generate each products HTML one at a time
        foreach ($items as $item) {
            // Here we 'glue' each product's HTML into an $output variable
            // to build up all of the HTML for every product into a single variable
            $output .= '<div>';
            $output .= "<h1>$item->name</h1>";
            $output .= "<img src='$item->image' />";
            $output .= "<p>£$item->price</p>";
            $output .= '</div>';
        }

        return $output;
    }
}