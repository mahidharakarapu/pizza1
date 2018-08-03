<?php

function day1($db) {
    $query = 'SELECT * FROM pizza_orders WHERE day=1';
    $smt = $db->prepare($query);
    $smt->execute();
    $devliverpizza = $smt->fetchAll();
    return $devliverpizza;    
}


function day2($db) {
    $query = 'SELECT * FROM pizza_orders WHERE day= 2';
    $smt = $db->prepare($query);
    $smt->execute();
    $devliverpizza = $smt->fetchAll();
    return $devliverpizza;    
}

function get_todays_ord($db, $day) {
    $query = 'SELECT * FROM pizza_orders where day=:day';
    $statement = $db->prepare($query);
    $statement->bindValue(':day',$day);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();   
    return $orders;
}

function get_currentday($db) {
    $query = 'SELECT * FROM pizza_sys_tab';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $currentday = $statement->fetch();
    $statement->closeCursor();    
    $current_day = $currentday['current_day'];
    return $current_day;
}

function increment_day($db){
    $query = 'UPDATE pizza_sys_tab SET current_day=current_day + 1';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $statement->closeCursor();    
}



function finish_day($db, $current_day) {
    $query = 'UPDATE pizza_orders SET status=3 WHERE day=:current_day';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day',$current_day);
    $statement->execute();
    $statement->closeCursor(); 
}
?>
