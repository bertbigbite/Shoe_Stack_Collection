<?php

require_once 'src/Trainers.php';
require_once 'src/TrainersModel.php';
require_once 'src/TrainerViewHelper.php';

if(
    isset($_POST['name']) &&
    isset($_POST['image']) &&
    isset($_POST['price']) &&
    isset($_POST['manufacturer_id'])
){
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $manufacturer_id = $_POST['manufacturer_id'];
    
    
    $name_valid = true;
    $image_valid = true;
    $price_valid = true;
   
  
    if (($name_valid) && ($image_valid) && ($price_valid)) {

      $db = new PDO('mysql:host=db; dbname=Shoe_Stack', 'root', 'password');
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         
      $query = $db->prepare(
        'INSERT INTO `trainers`
            (`name`, `image`, `price`, `manufacturer_id`)
            VALUES (:trainer_name, :trainer_image, :trainer_price, :manufacturer_id);');
    
      $success = $query->execute([
        ':trainer_name' => $name,
        ':trainer_image' => $image,
        ':trainer_price' => $price,
        ':manufacturer_id' => $manufacturer_id,
      ]);
      

      }   

    if(empty($_POST['name']) || (strlen($_POST['name']) > 100))
        $name_message = "* Name required. <br> * Must not be more than 100 characters";
        $name_valid = false;
    
    if(empty($_POST['image']) || (strlen($_POST['image']) > 500))
        $image_message = "* Image URL required. <br> * Must not be more than 500 characters";
        $image_valid = false;  
    
    if(empty($_POST['price']))
        $price_message = "* Price required";
        $price_valid = false;
    
    if (($_POST['price']) < 0)
        $price_message2 = "* Must not be negative number";
        $price_valid = false;

}

    ?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Shoe Stack</title>
</head>
    <header> 
    <div class="navigation">
            <span><img src="images/Shoe_Stack.png"></img></span>
            <nav class="links">
                <a href="index.php" class="second" alt="About">Trainers</a>
                <a href="AddTrainers.php" class="third" alt="Portfolio">Add Trainers</a>
                <a href="#" id="contactModal" class="fourth" alt="Contact">Search</a>
            </nav>
        </div>
    </header>
<body>

<div class="placeholder2">
<form method = "POST">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Add Trainers</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Add the details of your new collection item to be added to the database.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name<span class="note">*</span></label>
          <div class="mt-2">
            <input type="text" name="name" id="name" autocomplete="trainer-name" placeholder =" eg. Numeric 22"class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php 
            if (isset ($name_message)) {
                echo "<p class='note'>".$name_message."</p>";
                }?>
        </div>
        </div>

       <div class="sm:col-span-3">
          <label for="manufacturer_id" class="block text-sm font-medium leading-6 text-gray-900">Brand</label>
          <div class="mt-2">
            <select id="manufacturer_id" name="manufacturer_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option value ="1">Addidas</option>
                <option value ="2">Converse</option>
                <option value ="3">Nike</option>
                <option value ="4">New Balance</option>
                <option value ="5">Vans</option>
                <option value ="6">Reebok</option>
                <option value ="7">Puma</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image<span class="note">*</span></label>
          <div class="mt-2">
            <input type="text" name="image" id="imagee" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php
            if (isset ($image_message)) {
                echo "<p class='note'>".$image_message."</p>";
                }?>
        </div>
        </div>

        <div class="sm:col-span-4">
          <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price<span class="note">*</span></label>
          <div class="mt-2">
            <input id="price" name="price" type="number" autocomplete="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php
            if (isset ($price_message)) {
                echo "<p class='note'>".$price_message."</p>";
                }
            if (isset ($price_message2)) {
                echo "<p class='note'>".$price_message2."</p>";
                }?>
        </div>
        </div>

        <!-- <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
          <div class="mt-2">
            <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>United States</option>
              <option>Canada</option>
              <option>Mexico</option>
            </select>
          </div>
        </div> -->

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
    

  </div>
</form>
</div>

</div>
</body>
</html>



