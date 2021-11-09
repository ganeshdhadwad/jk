<?php
        error_reporting(E_ALL);
		include("../../includes/db/database.php");
        $valt = $_GET['valt'];
		$mid = $_GET['mid'];
		$st = '0';
		$at = '1';
		if($valt == 's'){
			$domenu = $db->prepare("UPDATE products SET status = :st WHERE productid = :mid");
			$domenu->bindParam(":st", $st);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/products-list');
		}else if($valt == 'a'){
			$domenu = $db->prepare("UPDATE products SET status = :st WHERE productid = :mid");
			$domenu->bindParam(":st", $at);
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/products-list');
		}else if($valt == 'd'){
			$domenu = $db->prepare("DELETE FROM products WHERE productid = :mid");
			$domenu->bindParam(":mid", $mid);
			$domenu->execute();
			header("location: ".$path.'admin/products-list');
		}else{
			header("location: ".$path.'admin/products-list');
		} 
?>