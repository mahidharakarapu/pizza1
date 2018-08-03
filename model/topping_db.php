<?php
// the try/catch for these actions is in the caller
function add_topping($db, $topping_name)  
{
    $query='INSERT INTO menu_toppings(topping)
             VALUES (:topping_name)';
    //here we wrote insert statement to insert topping values.
    $stmt=$db->prepare($query);
    $stmt->bindvalue(':topping_name',$topping_name);
    $stmt->execute();
    $stmt->closeCursor();
}

function delete_toppings($db,$delete)
{
    
    $query='DELETE FROM menu_toppings WHERE id=:delete';
    $stmt=$db->prepare($query);
    $stmt->bindvalue(':delete',$delete);
    $stmt->execute();
    $stmt->closeCursor();
}
function get_toppings($db) {
    $query = 'SELECT * FROM menu_toppings';
    $statement = $db->prepare($query);
    $statement->execute();
    $toppings = $statement->fetchAll();
    return $toppings;    
}

function get_topping_name($db,$toppin_id){
    $query = 'SELECT topping FROM menu_toppings where id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$toppin_id);
    $statement->execute();
    $topping_first = $statement->fetch();
    return $topping_first['topping'];
}