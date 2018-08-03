<?php
function add_order($db,$size,$room)  
{
 // global $db;
 $query = 'INSERT INTO pizza_orders (room_number,size,day,status) values (:room,:size,1,"Preparing")';
 $statement = $db->prepare($query);
 $statement->bindValue(':room', $room);
 $statement->bindValue(':size', $size);
 $statement->execute();
 $statement->closeCursor();

}

function add_order2($db, $room,$size,$current_day,$status, $topping_ids) {
    $query = 'INSERT INTO pizza_orders(room_number, size, day, status) '
            . 'VALUES (:room,:size,:current_day,:status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':room',$room);
    $statement->bindValue(':size',$size);
    $statement->bindValue(':current_day',$current_day);
    $statement->bindValue(':status',$status);
    $statement->execute();
    $statement->closeCursor(); 
    foreach ($topping_ids as $Toppingss){
        add_order_topping($db,$Toppingss);
    }
   
}
function get_orders($db) {
    $query = 'SELECT * FROM pizza_orders where status ="Preparing"';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    return $orders;    
}
function get_status($db) {
    $query = 'SELECT * FROM pizza_orders where status ="Preparing"';
    $statement = $db->prepare($query);
    $statement->execute();
    $orderdetails = $statement->fetchAll();
    return $orderdetails;    
}
function get_oldest_preparing($db) {
    $query = 'SELECT min(id) id FROM pizza_orders where status="Preparing"';
    $statement = $db->prepare($query);
    $statement->execute();
    $id = $statement->fetch()['id'];
    $statement->closeCursor();
    return $id;     
}


function update_ord($db,$updateorder) {
    $query = 'UPDATE pizza_orders SET status = "Baked" WHERE id =:updateorder';
    $statement = $db->prepare($query);
     $statement->bindValue(':updateorder', $updateorder);
    $statement->execute();
     $statement->closeCursor();
      
}
function add_order_topping($db, $topping_ids)
{
    global $db;
    $topping = get_topping_name($db,$topping_ids);
    $query='INNSERT INTO order_topping(order_id,topping) VALUES (last_insert_id(),:topping)';
        $statement = $db->prepare($query);
    $statement->bindValue(':topping', $topping);
    $statement->execute();
    $statement->closeCursor();
    }
function get_devliver($db) {
    $query = 'select * from  pizza_orders where status = "Finished"';
    $statement = $db->prepare($query);
     $statement->execute();
     $devliver = $statement->fetchAll();
    return $devliver;    
}

function get_roomnumber($db,$room) {
    $query = 'SELECT * FROM pizza_orders where room_number =:room';
    $statement = $db->prepare($query);
    $statement->bindValue(':room', $room);
    $statement->execute();
    $roomnumber = $statement->fetchAll();
    return $roomnumber;    
}
function get_acknowledge($db) {
    $query = 'UPDATE pizza_orders SET status = "Finished" WHERE status = "baked"';
    $statement = $db->prepare($query);
    $statement->execute();
     $statement->closeCursor();
       
}
   
        
?>