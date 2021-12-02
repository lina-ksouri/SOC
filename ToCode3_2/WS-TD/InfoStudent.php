<?php
class InfoStudent {

//function to be exposed must be public
public function getInfoStudent($cin) {
$info = array("CIN:".$cin , "Lina", "Ksouri","17/06/1998", "Result:succee"); 
return $info;
}
}
?>