<?php

$conn = 'mysql:host=localhost;dbname=siteteste';

try{
	$db = new PDO($conn, 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOEXCEPTION $e) {
	if($e->getCode() == 1049){
		echo "BDD errado";
	}else{
		echo $e->getMessage();
	}
}

?>