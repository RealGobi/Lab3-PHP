
<?php session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_SESSION["current"])){
        echo $_SESSION["cuttrent"];
    }
}
