<?php
        error_reporting(E_ALL);
		include("../../includes/db/database.php");
        $valt = $_GET['valt'];
		$mid = $_GET['mid'];
		$st = '0';
		$at = '1';
		if($valt == 's'){
			$domenu = $db->prepare("UPDATE contact_enquiry SET status = :st WHERE contacteid = :mid");
			$domenu->bindParam(":st", $at);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/contact-messages');
		}else if($valt == 'n'){
			$domenu = $db->prepare("UPDATE contact_enquiry SET status = :st WHERE contacteid = :mid");
			$domenu->bindParam(":st", $st);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/contact-messages');
		}else if($valt == 'd'){
			$domenu = $db->prepare("DELETE FROM contact_enquiry WHERE contacteid = :mid");
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/contact-messages');
		}else{
			header("location: ".$path.'admin/contact-messages');
		} 
?>