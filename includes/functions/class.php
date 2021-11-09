<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
	class cex{
		private $db;
		//db connection here
		function __construct($db)
		{
			$this->db = $db;
		}
		var $skey = "cex"; // you can change it
		public  function safe_b64encode($string) {
			$data = base64_encode($string);
			$data = str_replace(array('+','/','='),array('-','_',''),$data);
			return $data;
		}
		public function safe_b64decode($string) {
			$data = str_replace(array('-','_'),array('+','/'),$string);
			$mod4 = strlen($data) % 4;
			if ($mod4) {
				$data .= substr('====', $mod4);
			}
			return base64_decode($data);
		}
		var $salt = "cex";
		public function simple_encrypt($text,$salt)
		{  
			return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
		}
		
		public function simple_decrypt($text,$salt)
		{  
			return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
		}
		//encode value
		public function encode($value){ 
			if(!$value){return false;}
			$text = $value;
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
			return trim($this->safe_b64encode($crypttext)); 
		}
        //decode value
		public function decode($value){
			if(!$value){return false;}
			$crypttext = $this->safe_b64decode($value); 
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
			return trim($decrypttext);
		}

		public function orderUpdate($vendorid, $cartid, $orderid){
			//update
			$accepted = '2';
			$update = $this->db->prepare("UPDATE cart SET accepted = :accepted WHERE vendorid = :vid AND orderid = :orderid");
			$update->bindParam(":accepted", $accepted);
			$update->bindParam(":vid", $vendorid);
			$update->bindParam(":orderid", $orderid);
			$update->execute();

            $accept = '2';
			//update order table also 
			$updaten = $this->db->prepare("UPDATE orderm SET orderstatus = :accept, vendorid = :vid WHERE orderkey = :orderkey");
			$updaten->bindParam(":accept", $accept);
			$updaten->bindParam(":vid", $vendorid);
			$updaten->bindParam(":orderkey", $orderid);
			$updaten->execute();

			//count
			$check = $this->db->prepare("SELECT * FROM cart WHERE orderid = :orderid AND accepted = :accepted");
			$check->bindParam(":orderid", $orderid);
			$check->bindParam(":accepted", $accepted);
			$check->execute();
			//count
			$checkc = $check->rowCount();
			if($checkc > 0){
				$unique = '1';
				return $unique;
			}else{
				$unique = '0';
				return $unique;
			}
		}

		public function adddriver($vendorid, $driverid, $orderid, $cartid){
			//update
			//$accepted = '2';
			$update = $this->db->prepare("UPDATE cart SET driverid = :driverid WHERE cartid = :cartid");
			$update->bindParam(":driverid", $driverid);
			$update->bindParam(":cartid", $cartid);
			$update->execute();

            $accept = '2';
			//update order table also 
			$updaten = $this->db->prepare("UPDATE orderm SET driverid = :driverid WHERE orderkey = :vid");
			$updaten->bindParam(":driverid", $driverid);
			$updaten->bindParam(":vid", $orderid);
			$updaten->execute();

			//count
			$check = $this->db->prepare("SELECT * FROM cart WHERE cartid = :cartid");
			$check->bindParam(":cartid", $cartid);
			$check->execute();
			//count
			$checkc = $check->rowCount();
			if($checkc > 0){
				$unique = '1';
				return $unique;
			}else{
				$unique = '0';
				return $unique;
			}
		}
		
		//seo url
		public function seoUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
		}
		public function tologin($username, $password, $type)
		{
			if($type == '1'){
				$en = 'entered';
				$check = $this->db->prepare("SELECT * FROM consumer WHERE consumeremail = :username AND consumerpass = :upassword");
				$check->bindParam(':username', $username);
				$check->bindParam(':upassword', $password);
				$check->execute();
				//now count row
				$rowc = $check->rowCount();
				$get = $check->fetch(PDO::FETCH_ASSOC);
				if($rowc > 0){
					//get session now 
					$_SESSION['usession'] = $get['consumerid'];
					$rtype = $get['usertype'];
					$newtype = '2';
					if($newtype == $rtype){
					$unique = '1';
					return $unique;
					}else{
					$unique = '0';
					return $unique;	
					}
				}else{
					$unique = '0';
					return $unique;
				}
			}else if($type == '2'){
				$check = $this->db->prepare("SELECT * FROM users WHERE username = :username AND upassword = :upassword");
				$check->bindParam(':username', $username);
				$check->bindParam(':upassword', $password);
				$check->execute();
				//now count row
				$rowc = $check->rowCount();
				$get = $check->fetch(PDO::FETCH_ASSOC);
				if($rowc > 0){
					//get session now 
					$_SESSION['usession'] = $get['uid'];
					$rtype = $get['utype'];
					if($rtype == $type){
					$unique = '1';
					return $unique;
					}else{
					$unique = '0';
					return $unique;	
					}
				}else{
					$unique = '0';
					return $unique;
				}
			}
			
			//$rand = bin2hex(openssl_random_pseudo_bytes(12));
		   // $unique = $today . $rand;

			
		}
		public function toRegister($uname, $uemail, $upass, $umobile, $uadd, $created, $usertype)
		{
			$status = '1';
			$insert = $this->db->prepare("INSERT INTO `consumer` (`consumername`, `consumeremail`, `consumerpass`, `consumermob`, `consumeradd`, `created`, `status`, `usertype`) VALUES ('$uname', '$uemail', '$upass', '$umobile', '$uadd', '$created', '$status', '$usertype')");
			$insert->execute();
			//now count row
			//check if data inserted properly
			$check = $db->prepare("SELECT * FROM consumer WHERE consumeremail = :consumeremail AND created = :created");
	        $check->bindParam(':consumeremail', $uemail);
			$check->bindParam(':created', $created);
			$check->execute();
			//count row 
			$count = $check->rowCount();
			return $count;
			//$rand = bin2hex(openssl_random_pseudo_bytes(12));
		   // $unique = $today . $rand;

			
		}
		public function getlistorder() 
		{
		  try
		   {
			$stmt=$this->db->prepare("select * from `order`");
			$stmt->execute();
			while($dt = $stmt->fetchAll(PDO::FETCH_ASSOC)){
				$data[] = array("result" => 1, "data" => $dt);
				return $data;
			 }
		   } 
		  catch (PDOException $e) {
		  }
		  
		
		}
		public function getlistuser(){
		  
		    // select all query
		    $query = "SELECT * FROM consumer WHERE status = 1";
		  
		    // prepare query statement
		    $stmt = $this->db->prepare($query);
		    
		    $stmt->bindParam(':status', $status);
		    // execute query
		    $stmt->execute();
		  	while($dt = $stmt->fetchAll(PDO::FETCH_ASSOC)){
				$data[] = array("result" => 1, "data" => $dt);
				return $data;
			 }
		}

		public function getorderlist(){
		  
		    // select all query
		    $query = "SELECT * FROM orderm WHERE orderstatus > 0";
		  
		    // prepare query statement
		    $stmt = $this->db->prepare($query);
		    // execute query
		    $stmt->execute();
		  	while($dt = $stmt->fetchAll(PDO::FETCH_ASSOC)){
				$data[] = array("result" => 1, "data" => $dt);
				return $data;
			 }
		}
	}
?>