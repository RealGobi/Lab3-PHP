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
            if($_POST['collectionType'] == 'update'){
            include "updateHoroscope.php";
            $date = $_POST['inputDate'];
            $currentHoroskop = new AddHoroskop();
            $databaseResult = $currentHoroskop->update($date);
            echo json_encode($databaseResult);
            exit();
        }
         
    } catch(PODException $e){
        throw $e;
    }
} 



?>