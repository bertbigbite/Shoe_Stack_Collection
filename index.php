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
    <title>Shoe Stack</title>
</head>
<body>

<div class = "placeholder">
<?php 


echo TrainerViewHelper::displayAllItems($items);

?>
</div>
</body>
</html>



