<?php
// the try/catch for these actions is in the caller
function add_size($db, $size_name)  
{
    $query='INSERT INTO menu_sizes(size)
             VALUES (:size_name)';
    //here we wrote insert statement to insert size values.
    $stmt=$db->prepare($query);
    $stmt->bindvalue(':size_name',$size_name);
    $stmt->execute();
    $stmt->closeCursor();
}
function get_pizzasizes($db) {
    $query = 'SELECT * FROM menu_sizes';
    $statement = $db->prepare($query);
    $statement->execute();
    $pizza_sizes = $statement->fetchAll();
    return $pizza_sizes;    
}

function delete_sizes($db,$size_pizza)
{
    
    $query='DELETE FROM menu_sizes WHERE id=:size_pizza';
    $stmt=$db->prepare($query);
    $stmt->bindvalue(':size_pizza',$size_pizza);
    $stmt->execute();
    $stmt->closeCursor();
}

