

 <?php

class AddHoroskop{
    function __construct(){
        include_once('database.php');
        $this->database = new Database();
    }
     public function save($date){

        $query = $this->database->connection->prepare("SELECT * FROM horoskop;");
        $query->execute();
        $result = $query->fetchAll();


        if(empty($result)){
            return array('error' => 'Något gick fel');
        }
        return check($date, $result);
    }
}
function check($date, $result){

    $checkDate = new DateTime($date);
    foreach($result as $item){
            $upperBound = new DateTime($item['dateFrom']);
				$lowerBound = new DateTime($item['dateUntil']);
				
            if ($lowerBound < $checkDate && $checkDate < $upperBound){
                    return  $item['horoscopeSign'];
				}

        }

        //  if ($lowerBound < $upperBound) {
        //      $between = $lowerBound < $checkDate && $checkDate < $upperBound;
        //  } else {
        //      $between = $checkDate < $upperBound || $checkDate > $lowerBound;
        //  }
        //  return $between;
     }






?>