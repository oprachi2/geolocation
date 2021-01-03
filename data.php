<?php 
    //include configuration file
    require 'Connection.php';

    $start = 0;  $per_page = 4;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
    
    if(isset($_GET['start'])){
     $start = $_GET['start'];
     $page_counter =  $_GET['start'];
     $start = $start *  $per_page;
     $next = $page_counter + 1;
     $previous = $page_counter - 1;
    }
    // query to get messages from messages table
    $q = "SELECT *, 3956 * 2 * ASIN ( SQRT (
        POWER(SIN((details.latitude - 26.785430)*pi()/180 / 2),
        2) + COS(details.latitude * pi()/180) * COS(26.785430 *
        pi()/180) * POWER(SIN((details.longitude - 80.915830) *
        pi()/180 / 2), 2) ) ) as distance
        FROM details
        ORDER BY distance ASC
        ";
    $query = $db->prepare($q);
    $query->execute();

    if($query->rowCount() > 0){
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // count total number of rows in user table
    $count_query = "SELECT *, 3956 * 2 * ASIN ( SQRT (
        POWER(SIN((details.latitude - 26.785430)*pi()/180 / 2),
        2) + COS(details.latitude * pi()/180) * COS(26.785430 *
        pi()/180) * POWER(SIN((details.longitude - 80.915830) *
        pi()/180 / 2), 2) ) ) as distance
        FROM details
        ORDER BY distance ASC
        ";
    $query = $db->prepare($count_query);
    $query->execute();
    $count = $query->rowCount();
    $paginations = ceil($count / $per_page);
?>