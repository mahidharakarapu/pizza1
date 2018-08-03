<?php
require('../model/database.php');
require('../model/size_db.php');
require('../model/topping_db.php');
require('../model/order_db.php');
require('../model/day_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'pizza_order';
    }
}
if ($action == 'pizza_order')
    {
    //$room=1;
     $room = filter_input(INPUT_POST, 'room');
        $toppings = get_toppings($db);
         $sizes = get_pizzasizes($db);
         $roomnumber= get_roomnumber($db,$room);
        include('student_welcome.php');
}

 else if ($action == 'order')
     {
         $toppings = get_toppings($db);
         $sizes = get_pizzasizes($db);
        include('order_pizza.php');
}

elseif ($action == 'add_order') 
    {
    $size_id = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);
    $room = filter_input(INPUT_POST,'room');
    try
    {
        $current_day = 1;
    }
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    $status = "Preparing";
   
    try
    {
        add_order2($db, $room, $size_id, $current_day, $status, $topping_ids);
    }
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    header("Location: .?room=$room");
}
else if ($action == 'progress')
    {
     $room = filter_input(INPUT_POST, 'room');
     $toppings = get_toppings($db);
         $sizes = get_pizzasizes($db);
     $roomnumber= get_roomnumber($db,$room);
        include('student_welcome.php');     
}
else if ($action == 'Acknowledge')
    {
    get_acknowledge($db);
      $room = filter_input(INPUT_POST, 'room');
      $toppings = get_toppings($db);
         $sizes = get_pizzasizes($db);
         $roomnumber= get_roomnumber($db,$room);
        include('student_welcome.php');
}
     else if ($action == 'add_topping') 
         {
    $topping_name = filter_input(INPUT_POST, 'topping_name');
    if ($topping_name == NULL || $topping_name == FALSE)
        {
        $error = "Invalid topping name";
        include('../errors/error.php');
    } 
    else
        {
        try
        {
            add_topping($db, $topping_name);
        }
        catch (PDOException $e) 
        {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();  
        }
        
        header("Location: .");
    }
}