<?php
        error_reporting(E_ALL);
		include("../../includes/db/database.php");
        $valt = $_GET['valt'];
		$mid = $_GET['mid'];
		$st = '0';
		$at = '1';
		if($valt == 's'){
			$domenu = $db->prepare("UPDATE main_menu SET status = :st WHERE menuid = :mid");
			$domenu->bindParam(":st", $st);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/top-menu');
		}else if($valt == 'a'){
			$domenu = $db->prepare("UPDATE main_menu SET status = :st WHERE menuid = :mid");
			$domenu->bindParam(":st", $at);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/top-menu');
		}else if($valt == 'd'){
			$domenu = $db->prepare("DELETE FROM main_menu WHERE menuid = :mid");
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/top-menu');
		}else{
			header("location: ".$path.'admin/top-menu');
		} 
?>