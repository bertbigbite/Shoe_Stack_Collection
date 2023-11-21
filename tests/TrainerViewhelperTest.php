<?php

require_once 'src/TrainerViewHelper.php';

use PHPUnit\Framework\TestCase;

class TrainerViewHelperTest extends TestCase
{
    public function test_trainer_viewhelper_single(): void
    {
        $output = '<div>';
        $output .= "<h1>classic</h1>";
        $output .= "<p>Reebok</p>";
        $output .= "<img src='khgvowbvbou2b' />";
        $output .= "<p>£34.99</p>";
        $output .= '</div>';

        $newtrainer= new Trainer(1,'classic',34.99,'khgvowbvbou2b','Reebok');

        $result = TrainerViewHelper::displaySingleItem($newtrainer);
        
        $this->assertEquals($output, $result);
}

public function test_trainer_viewhelper_all(): void
    {
        $output = '<div class = "itemdisplay">';
        $output .= "<h1>Classic</h1>";
        $output .= "<img src='khgvowbvbou2b' />";
        $output .= "<p>Reebok</p>";
        $output .= "<p>£34.99</p>";
        $output .= '</div>';

        // Adding a dot before the equals to append the two lots of outputs together to craete an array
        $output .= '<div class = "itemdisplay">';
        $output .= "<h1>Gazelle</h1>";
        $output .= "<img src='gvsbhljvebb' />";
        $output .= "<p>Addidas</p>";
        $output .= "<p>£67.99</p>";
        $output .= '</div>';

        // Instatiate 2 instances of the Trainer class
        $newtrainer= new Trainer(1,'Classic', 34.99,'khgvowbvbou2b','Reebok');
        $newtrainer2= new Trainer(4,'Gazelle', 67.99,'gvsbhljvebb','Addidas');

        // Pass the two new Trainer instances into the function as an array parameter. This is because the function is type hinted as an array.
        $result = TrainerViewHelper::displayAllItems([$newtrainer,$newtrainer2]);
        
        $this->assertEquals($output, $result);


}
} 