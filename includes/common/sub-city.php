<?php 
	include("../db/database.php");
	$st = '1';
	$stateID = $_POST['cityid'];
		$citylist = $db->prepare("SELECT * FROM sub_city WHERE subcity_rel = :rel AND status = :status ORDER BY subcityid ASC");
		$citylist->bindParam(':rel', $stateID);
		$citylist->bindParam(':status', $st);
		$citylist->execute();
		$countrow = $citylist->rowCount();
		if($countrow > 0){
			 echo '<option value="">Select your city</option>';
   			 while ($row = $citylist->fetch(PDO::FETCH_ASSOC)){
        		$citiesname = $row['subcityname'];
        		$citiesid = $row['subcityid'];
        		echo '<option value="'.$citiesid.'">'.$citiesname.'</option>';
			}
		}else{
			echo '0'; 
		}
?>