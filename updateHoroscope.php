<?php session_start(); ?>

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
        return update($date, $result);
    }
}
function update($date, $result){
	$myDate = new DateTime($date);
	$found = false;
    $_SESSION['current'] = '';

	for ($i = 0; $i < count($result) && !$found;$i++){
		$from = new DateTime($result[$i]['dateFrom']);
        $to = new DateTime($result[$i]['dateUntil']);
 
		if ($from <= $myDate && $myDate <= $to){
				$res =   $result[$i]['horoscopeSign'];
				$found = true;
                $_SESSION['current'] = $result[$i]['horoscopeSign'];
                echo json_encode($_SESSION['current']);
                exit();
			} else {
				$res = 'nopp';
		}
 } 
 return $res;
}







?>