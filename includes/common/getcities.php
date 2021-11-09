<?php 
	include("../db/database.php");
	$st = '1';
	$stateID = $_POST['stateid'];
		$citylist = $db->prepare("SELECT * FROM cities WHERE cities_rel = :rel AND status = :status ORDER BY citiesid ASC");
		$citylist->bindParam(':rel', $stateID);
		$citylist->bindParam(':status', $st);
		$citylist->execute();
		$countrow = $citylist->rowCount();
		if($countrow > 0){
			 echo '<option value="">Select city</option>';
   			 while ($row = $citylist->fetch(PDO::FETCH_ASSOC)){
        		$citiesname = $row['citiesname'];
        		$citiesid = $row['citiesid'];
        		echo '<option value="'.$citiesid.'">'.$citiesname.'</option>';
			}
		}else{
			echo '<option value="">City not available</option>'; 
		}
?>