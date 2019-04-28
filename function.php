<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
        if($_POST['collectionType'] == 'current'){
             include "addHoroscope.php";
             $date = $_POST['inputDate'];
             $currentHoroskop = new AddHoroskop();
             $databaseResult = $currentHoroskop->save($date);
             echo json_encode($databaseResult);
             exit();
            } 
        else {
             include "updateHoroscope.php";
             $date = $_POST['inputDate'];
             $currentHoroskop = new UpdateHoroskop();
             $databaseResult = $currentHoroskop->update($date);
             echo json_encode($databaseResult);
             exit();
            } 
    } catch(PODException $e){
        throw $e;
    }
} 



?>