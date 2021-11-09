<?php
        error_reporting(E_ALL);
		include("../../includes/db/database.php");
        $valt = $_GET['valt'];
		$mid = $_GET['mid'];
		$st = '2';
		$at = '1';
		if($valt == 's'){
			$domenu = $db->prepare("UPDATE careers SET status = :st WHERE careerid = :mid");
			$domenu->bindParam(":st", $st);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/career-messages');
		}else if($valt == 'n'){
			$domenu = $db->prepare("UPDATE careers SET status = :st WHERE careerid = :mid");
			$domenu->bindParam(":st", $at);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/career-messages');
		}else if($valt == 'd'){
			$domenu = $db->prepare("DELETE FROM careers WHERE careerid = :mid");
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/career-messages');
		}else{
			header("location: ".$path.'admin/career-messages');
		} 
?>