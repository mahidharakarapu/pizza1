<?php

require('../model/database.php');
require('../model/initial.php');
require('../model/day_db.php');
require ('../model/order_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list';
    }
}

$current_day = get_currentday($db);
if ($action == 'list') {
    try {
        $todays_orders = get_todays_ord($db, $current_day);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    include('day_list.php');
} else if ($action == 'next_day') {
    try {
        finish_day($db, $current_day);
        increment_day($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
} else if ($action == 'initial_db') {
    try {
        initial_db($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
}