<?php session_start(); ?>

<?php

class UpdateHoroskop{
    function __construct(){
        include_once('database.php');
        $this->database = new Database();
    }
     public function update($date){

        $query = $this->database->connection->prepare("SELECT * FROM horoskop;");
        $query->execute();
        $result = $query->fetchAll();

        if(empty($result)){
            return array('error' => 'Något gick fel');
        }
        return makeUpdate($date, $result);
    }
}
 
    function makeUpdate($date, $result){
    $myDate = new DateTime($date);
    $found = false;

    for ($i = 0; $i < count($result) && !$found;$i++){
        $from = new DateTime($result[$i]['dateFrom']);
        $to = new DateTime($result[$i]['dateUntil']);
    
        if ($from <= $myDate && $myDate <= $to){
            $res = true;
            $found = true;
            $_SESSION['current'] = $result[$i]['horoscopeSign'];
            } else {
                $res = false;
        }
    } 
    return $res;
}

?>