<?php

require('../model/database.php');
require('../model/size_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_sizes';
    }
}

if ($action == 'list_sizes') {
    try
    {
        $sizes = get_pizzasizes($db);
        include('size_list.php');
    } 
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
    } 
else if ($action == 'show_add_form')
    {
    include('size_add.php');
}
else if ($action == 'add_size')
    {
    $size_name = filter_input(INPUT_POST, 'size_name');
    if ($size_name == NULL || $size_name == FALSE)
        {
        $error = "Invalid size selection";
        include('../errors/error.php');
    } 
    else
        {
        try
        {
            add_size($db, $size_name);
        }
        catch (PDOException $e) 
        {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();  
        }
        // Redirect back to index.php (see pp. 164-165)
        // (don't include index.php inside index.php)
        header("Location: .");
    }
}
else if($action=='delete_size')
{
    $size= filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    if($size==NULL||$size==FALSE)
    {
        $error="size id is wrong or missing";
        include ('../errors/error.php');
    }
    else{
   
       
        //$sizes = get_sizes($db);
          try {
            delete_sizes($db,$size);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();
        }
       
        header("Location: .");
    }


}

