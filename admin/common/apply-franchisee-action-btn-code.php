<?php
        error_reporting(E_ALL);
		include("../../includes/db/database.php");
        $valt = $_GET['valt'];
		$mid = $_GET['mid'];
		$bt = '1';
		$st = '2';
		$at = '3';
		if($valt == 'c'){
			$domenu = $db->prepare("UPDATE apply_for_franchisee SET status = :st WHERE applyfranchiseeid  = :mid");
			$domenu->bindParam(":st", $st);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/franchisee-enquiries');
		}else if($valt == 'v'){
			$domenu = $db->prepare("UPDATE apply_for_franchisee SET status = :st WHERE applyfranchiseeid  = :mid");
			$domenu->bindParam(":st", $at);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/franchisee-enquiries');
		}else if($valt == 'e'){
			$domenu = $db->prepare("UPDATE apply_for_franchisee SET status = :st WHERE applyfranchiseeid  = :mid");
			$domenu->bindParam(":st", $bt);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/franchisee-enquiries');
		}else{
			header("location: ".$path.'admin/franchisee-enquiries');
		} 
?>