<?php

 include "addHoroscope.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
            $date = $_POST['inputDate'];
            $currentHoroskop = new AddHoroskop();
            $databaseResult = $currentHoroskop->save($date);
            echo json_encode($databaseResult);
            exit();
         
    } catch(PODException $error){
        throw $e;
    }
} 


?>