<?php

require_once 'src/TrainersModel.php';
require_once 'src/TrainerViewHelper.php';


$db = new PDO('mysql:host=db; dbname=Shoe_Stack', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Instatiate a new ItemsModel and pass the database property into it
$itemsModel = new TrainersModel($db);

// apply the GetAllItems method declared in the file to the property declared above, which contains a new instance of the ItemsModel class
$items = $itemsModel->getAllItems();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Shoe Stack</title>
</head>
<header> <!-- Header Div -->
        <div class="navigation">
            <a href="index.php"><img src="images/Shoe_Stack.png"></img></a>
            <nav class="links">
                <a class="bg-amber-500 shadow-lg cursor-pointer px-2 py-1 rounded hover:bg-black hover:text-white" href="AddTrainers.php" alt="Add Trainers"><p>+ ADD</p></a>
            </nav>
        </div>
    </header>
<body>

<div class = "placeholder">
<?php 

echo TrainerViewHelper::displayAllItems($items);

?>
</div>
<footer class="footer"> 
        <div class="footertop">
            <a class =" footerimage" href="index.php"><img src="images/Shoe_Stack.png"></img></a>
            <span class="social">
                <a class="#"></a>
                <a class="#"></a>
            </span>
        </div>
        
        <div class="footerbottom">
            <p> © Copyright 2023</p>
        </div>
    </footer>
</body>
</html>



