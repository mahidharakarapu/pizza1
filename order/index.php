
<?php

require('../model/database.php');
require('../model/order_db.php');
require('../model/initial.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}

if ($action == 'list_orders')
    {
    $orders = get_orders($db);
    $devliver = get_devliver($db);
    $orderdetails= get_status($db);
    include('order_list.php');
}
else if ($action == 'update_baked') 
    {
  try
    {
      //$update = filter_input(INPUT_POST, 'id');
      $next_id = get_oldest_preparing($db);
      update_ord($db, $next_id);
      header("Location: index.php");
           
    }
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
            //$orders = get_orders($db);
          //  $ord= get_ord($db);
          //  $dev = get_dev($db);
         
        
    } 
else if ($action == 'initial_db')
    {
    try
    {
        initialize_db($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
    }
}
  
?>