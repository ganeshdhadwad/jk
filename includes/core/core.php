<?php
	error_reporting(E_ALL);
	include("../db/database.php");
	include("../functions/class.php");
	// These must be at the top of your script, not inside a function
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			// Include files for PHPMailer and SMTP protocol  
			require '../../phpmailnow/src/Exception.php';
			require '../../phpmailnow/src/PHPMailer.php';
			require '../../phpmailnow/src/SMTP.php';
	$cex = new cex($db);
	$personData = json_decode($_REQUEST['data']);
    $action = $personData->action;
	//check user login details
	if ($action == 'slogin'){
		$uemail = $personData->username;
		$upass = $personData->password;
		//check details
		$check = $db->prepare("SELECT * FROM staff WHERE username = :username AND password = :password");
		$check->bindParam(':username', $uemail);
		$check->bindParam(':password', $upass);
		$check->execute();
		$count = $check->rowCount();
		//fetch details
		$fetch = $check->fetch(PDO::FETCH_ASSOC);
		$uid = $fetch['staffid'];
		$utype = $fetch['type'];
		$_SESSION['staffid'] = $uid;
		if($count > 0){
			if($utype == 3){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'staff/dashboard';
			}
			if($utype == 4){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/dashboard';
			}
		}else if ($count == 0){
			$json['success'] = false;
		    $json['result'] = 0;
		    $json['count'] = $count;
		}
	}
	if ($action == 'addproductcategory'){
		$pcatname = $personData->pcatname;
		$pcaticon = $personData->pcaticon;
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$status = '1';
		//Title to friendly URL conversion
		//$newtitle=string_limit_words($menuname, 8); // First 6 words
		$urltitle=preg_replace('/[^a-z0-9]/i',' ', $pcatname);
		$newurltitle=str_replace(" ","-",$pcatname);
		$newurlf = strtolower($newurltitle);
		//remove exclaimation and comma from the heading for seo 
		$menuseotitle = preg_replace("([^a-zA-Z0-9-])","",$newurlf);
		//echo $menuseotitle;
		//check details
		$insert = $db->prepare('INSERT INTO products_category (pcatname, pcatseourl, pcaticon, status, color, sort_order) VALUES (:pcatname, :pcatseourl, :pcaticon, :status, :color, :sort_order)');
		   $insert->bindParam(':pcatname', $pcatname);
		   $insert->bindParam(':pcatseourl', $menuseotitle);
		   $insert->bindParam(':pcaticon', $pcaticon);
		   $insert->bindParam(':status', $status);
		   $insert->bindParam(':color', $defaultvalue);
		   $insert->bindParam(':sort_order', $defaultvalue);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM products_category WHERE pcatname = :pcatname AND pcatseourl = :pcatseourl");
		   $check1->bindParam(':pcatname', $pcatname);
		   $check1->bindParam(':pcatseourl', $menuseotitle);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/product-categories';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['url'] = 'admin/product-categories';
			}
	}
	if ($action == 'addtopmenu'){
		$menuname = $personData->menuname;
		$submenun = $personData->submenun;
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$status = '1';
		//Title to friendly URL conversion
		//$newtitle=string_limit_words($menuname, 8); // First 6 words
		$urltitle=preg_replace('/[^a-z0-9]/i',' ', $menuname);
		$newurltitle=str_replace(" ","-",$menuname);
		$newurlf = strtolower($newurltitle);
		//remove exclaimation and comma from the heading for seo 
		$menuseotitle = preg_replace("([^a-zA-Z0-9-])","",$newurlf);
		//echo $menuseotitle;
		//check details
		$insert = $db->prepare('INSERT INTO main_menu (menu_name, menu_seo_name, submenu, status, submenu_rel_id, submenu2, submenu2_rel) VALUES (:menu_name, :menu_seo_name, :submenu, :status, :submenu_rel_id, :submenu2, :submenu2_rel)');
		   $insert->bindParam(':menu_name', $menuname);
		   $insert->bindParam(':menu_seo_name', $menuseotitle);
		   $insert->bindParam(':submenu', $defaultvalue);
		   $insert->bindParam(':submenu_rel_id', $defaultvalue);
		   $insert->bindParam(':submenu2', $defaultvalue);
		   $insert->bindParam(':submenu2_rel', $defaultvalue);
		   $insert->bindParam(':status', $status);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM main_menu WHERE menu_name = :menuname AND menu_seo_name = :menuseotitle");
		   $check1->bindParam(':menuname', $menuname);
		   $check1->bindParam(':menuseotitle', $menuseotitle);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/top-menu';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['url'] = 'admin/add-top-menu';
			}
	}
	if ($action == 'addtopsubmenu'){
		$mainmenuid = $personData->mainmenuid;
		$submenuname = $personData->submenuname;
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$status = '1';
		//Title to friendly URL conversion
		//$newtitle=string_limit_words($menuname, 8); // First 6 words
		$urltitle=preg_replace('/[^a-z0-9]/i',' ', $submenuname);
		$newurltitle=str_replace(" ","-",$submenuname);
		$newurlf = strtolower($newurltitle);
		//remove exclaimation and comma from the heading for seo 
		$menuseotitle = preg_replace("([^a-zA-Z0-9-])","",$newurlf);
		//echo $menuseotitle;
		$puturl = '';
		//remove seo url from  main menu
		$remove = $db->prepare("UPDATE main_menu SET menu_seo_name = :seoname WHERE menuid = :menuid");
		$remove->bindParam(":seoname", $puturl);
		$remove->bindParam(":menuid", $mainmenuid);
		$remove->execute();
		//check details
		$insert = $db->prepare('INSERT INTO main_menu (menu_name, menu_seo_name, submenu, status, submenu_rel_id, submenu2, submenu2_rel) VALUES (:menu_name, :menu_seo_name, :submenu, :status, :submenu_rel_id, :submenu2, :submenu2_rel)');
		   $insert->bindParam(':menu_name', $submenuname);
		   $insert->bindParam(':menu_seo_name', $menuseotitle);
		   $insert->bindParam(':submenu', $defaultvalue);
		   $insert->bindParam(':submenu_rel_id', $mainmenuid);
		   $insert->bindParam(':submenu2', $defaultvalue);
		   $insert->bindParam(':submenu2_rel', $defaultvalue);
		   $insert->bindParam(':status', $status);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM main_menu WHERE menu_name = :menuname AND menu_seo_name = :menuseotitle");
		   $check1->bindParam(':menuname', $submenuname);
		   $check1->bindParam(':menuseotitle', $menuseotitle);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/top-menu';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['url'] = 'admin/add-top-menu';
			}
	}

	if ($action == 'addcoverage'){
		$maincoveragetypeid = $personData->maincoveragetypeid;
		$coveragename = $personData->coveragename;
		$coveragedescription = $personData->coveragedescription;
		$coverageurl = $personData->coverageurl;
		$pimg = $personData->pimg;
		$created = time();
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//Title to friendly URL conversion
		//$newtitle=string_limit_words($menuname, 8); // First 6 words
		$urltitle=preg_replace('/[^a-z0-9]/i',' ', $coveragename);
		$newurltitle=str_replace(" ","-",$coveragename);
		$newurlf = strtolower($newurltitle);
		//remove exclaimation and comma from the heading for seo 
		$menuseotitle = preg_replace("([^a-zA-Z0-9-])","",$newurlf);
		//echo $menuseotitle;
		//check details
		$insert = $db->prepare('INSERT INTO coverage (coverage_head, coverage_desc, coverage_img, coverage_type, created, status, coverage_url, coverage_seo_url) VALUES (:coverage_head, :coverage_desc, :coverage_img, :coverage_type, :created, :status, :coverage_url, :coverage_seo_url)');
		   $insert->bindParam(':coverage_head', $coveragename);
		   $insert->bindParam(':coverage_desc', $coveragedescription);
		   $insert->bindParam(':coverage_img', $pimg);
		   $insert->bindParam(':coverage_type', $maincoveragetypeid);
		   $insert->bindParam(':created', $created);
		   $insert->bindParam(':coverage_url', $coverageurl);
		   $insert->bindParam(':status', $statusn);
		   $insert->bindParam(':coverage_seo_url', $menuseotitle);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM coverage WHERE coverage_seo_url = :coverage_seo_url AND created = :created");
		   $check1->bindParam(':coverage_seo_url', $menuseotitle);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/coverage-list';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['url'] = 'admin/coverage-list';
			}
	}

	if ($action == 'addproduct'){
		$mainproducttypeid = $personData->mainproducttypeid;
		$productname = $personData->productname;
		$productdescription = $personData->productdescription;
		$pimg = $personData->pimg;
		$created = time();
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//Title to friendly URL conversion
		//$newtitle=string_limit_words($menuname, 8); // First 6 words
		$urltitle=preg_replace('/[^a-z0-9]/i',' ', $productname);
		$newurltitle=str_replace(" ","-",$productname);
		$newurlf = strtolower($newurltitle);
		//remove exclaimation and comma from the heading for seo 
		$menuseotitle = preg_replace("([^a-zA-Z0-9-])","",$newurlf);
		//echo $menuseotitle;
		//check details
		$insert = $db->prepare('INSERT INTO products (product_name, product_description, product_img, product_category, created, status, productseoname) VALUES (:product_name, :product_description, :product_img, :product_category, :created, :status, :productseoname)');
		   $insert->bindParam(':product_name', $productname);
		   $insert->bindParam(':product_description', $productdescription);
		   $insert->bindParam(':product_img', $pimg);
		   $insert->bindParam(':product_category', $mainproducttypeid);
		   $insert->bindParam(':created', $created);
		   $insert->bindParam(':status', $statusn);
		   $insert->bindParam(':productseoname', $menuseotitle);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM products WHERE productseoname = :productseoname AND created = :created");
		   $check1->bindParam(':productseoname', $menuseotitle);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['url'] = 'admin/products-list';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['url'] = 'admin/products-list';
			}
	}

	if ($action == 'submitfranchise'){
		$selectyourstate = $personData->selectyourstate;
		$selectyourcities = $personData->selectyourcities;
		$howyouknowjumboking = $personData->howyouknowjumboking;
		$preffereddcallbackdate = $personData->preffereddcallbackdate;
		$preffereddcallbacktime = $personData->preffereddcallbacktime;
		$applymobile = $personData->applymobile;
		$applyname = $personData->applyname;
		$applyemailid = $personData->applyemailid;
		$wheredoyoustay = $personData->wheredoyoustay;
		if(is_numeric($wheredoyoustay)){
			//get subcity name
			$sbcity = $db->prepare("SELECT * FROM sub_city WHERE subcityid = :subid");
			$sbcity->bindParam(":subid", $wheredoyoustay);
			$sbcity->execute();
			//fetch 
			$sft = $sbcity->fetch(PDO::FETCH_ASSOC);
			$subcityname = $sft['subcityname'];
		  }
		  else{
			$subcityname = $wheredoyoustay;
		  }
		$created = time();
		$createddate = date("jS F, g:i A", $created);
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//get states from db
		$getst = $db->prepare("SELECT * FROM state WHERE stateid = :stid");
		$getst->bindParam(":stid", $selectyourstate);
		$getst->execute();
		//fetch name
		$getsf = $getst->fetch(PDO::FETCH_ASSOC);
		$getsname = $getsf['statename']; 
		// print($getsname);
		//get city from db
		$getct = $db->prepare("SELECT * FROM cities WHERE citiesid = :ctid");
		$getct->bindParam(":ctid", $selectyourcities);
		$getct->execute();
		//fetch name
		$getcf = $getct->fetch(PDO::FETCH_ASSOC);
		$getcname = $getcf['citiesname']; 
		// print($getcname); 
		//check details
		$insert = $db->prepare('INSERT INTO apply_for_franchisee (state, cities, name, emailid, where_do_stay, how_know_jumboking, call_back_date, call_back_time, mobile_no, status, created) VALUES (:state, :cities, :name, :emailid, :where_do_stay, :how_know_jumboking, :call_back_date, :call_back_time, :mobile_no, :status, :created)');
		   $insert->bindParam(':state', $getsname);
		   $insert->bindParam(':cities', $getcname);
		   $insert->bindParam(':name', $applyname);
		   $insert->bindParam(':emailid', $applyemailid);
		   $insert->bindParam(':where_do_stay', $subcityname);
		   $insert->bindParam(':how_know_jumboking', $howyouknowjumboking);
		   $insert->bindParam(':call_back_date', $preffereddcallbackdate);
		   $insert->bindParam(':call_back_time', $preffereddcallbacktime);
		   $insert->bindParam(':mobile_no', $applymobile);
		   $insert->bindParam(':status', $statusn);
		   $insert->bindParam(':created', $created);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM apply_for_franchisee WHERE emailid = :emailid AND created = :created");
		   $check1->bindParam(':emailid', $applyemailid);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['output'] = 'Applied Successfully!<br/>Our team will get back to you shortly!';
		    	$india = 'India';
		    	$ch = curl_init('http://www.salesbabucrm.com/crm/wc?');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "ai=16&e=4&rc=jr16x9k&rd=".$created."&ti=".$createddate."&cty=".$subcityname."&ct=&cfn=".$applyname."&cln=&cph=&cmo=".$applymobile."&cem=".$applyemailid."&addr1=".$subcityname."&city=".$getcname."&st=".$getsname."&ctry=".$india."&pin=&lo=".$subcityname."&ffca=".$subcityname."&fod=".$preffereddcallbackdate."&fot=".$preffereddcallbacktime);

				// execute!
				$response = curl_exec($ch);

				// close the connection, release resources used
				curl_close($ch);

				// do anything you want with your response
				$json['salesbabu'] = $response;
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['output'] = 'Error in Applying!<br/>Please try again!';
			}
	}

	if ($action == 'addapplication'){
		$applyingposition = $personData->applyingposition;
		$firstname = $personData->firstname;
		$lastname = $personData->lastname;
		$emailid = $personData->emailid;
		$phonenumber = $personData->phonenumber;
		$message = $personData->message;
		$cvupload = $personData->cvupload;
		$created = time();
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//check details
		$insert = $db->prepare('INSERT INTO careers (firstname, lastname, emailid, phonenumber, applyposition, uploadcv, message, status, created) VALUES (:firstname, :lastname, :emailid, :phonenumber, :applyposition, :uploadcv, :message, :status, :created)');
		   $insert->bindParam(':firstname', $firstname);
		   $insert->bindParam(':lastname', $lastname);
		   $insert->bindParam(':emailid', $emailid);
		   $insert->bindParam(':phonenumber', $phonenumber);
		   $insert->bindParam(':applyposition', $applyingposition);
		   $insert->bindParam(':uploadcv', $cvupload);
		   $insert->bindParam(':message', $message);
		   $insert->bindParam(':status', $statusn);
		   $insert->bindParam(':created', $created);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM careers WHERE emailid = :emailid AND created = :created");
		   $check1->bindParam(':emailid', $emailid);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   //mail function start
		   date_default_timezone_set('Etc/UTC');
		
			// Import PHPMailer classes into the global namespace
			
			// Initialize PHP Mailer
			$mail = new PHPMailer(true); 
			$mail->isSendmail();
			// Set SMTP as mailing protocol
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Mailer = "smtp";

		    // Set required parameters for making an SMTP connection
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
		    $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
		    $mail->Port = 465;                                    // TCP port to connect to (587 is a standard port for SMTP)
		    $mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
		    $mail->Username = "info@jumboking.co.in";              // SMTP username
		    $mail->Password = "wmrhcuboxklnmeiq";                     // SMTP password

    		// Specify recipients
    		$mail->setFrom('info@jumboking.co.in', 'JumboKing');  
			$mail->addAddress('mansi.p@jumboking.co.in', 'Mansi Patel'); 
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'JumboKing Website - Career Submit.';
			$mail->Body = 'Below is the Applicant details from the website jumboking.in<br/><br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Applying for Position:</strong> <br/>'.$applyingposition.'<br/><br/><strong>CV URL:</strong> <br/><a href="https://www.jumboking.co.in/'.$uploads.$cvupload.'" target="_blank">view resume</a><br/><br/><strong>Message:</strong> <br/>'.$message.'<br/><br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			$mail->AltBody = 'Below is the enquiry details from the website<br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Subject:</strong> <br/>'.$subject.'<br/><br/><strong>Message:</strong> <br/>'.$message.'<br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				$emailsend = '0';
			} else {
			//echo 'Message has been sent';
				$emailsend = '1';
			}
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['output'] = 'Applied Successfully!<br/>Our team will get back to you shortly!';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['output'] = 'Error in Applying!<br/>Please try again!';
			}
	}

	if ($action == 'addcontactmsg'){
		$firstname = $personData->firstname;
		$lastname = $personData->lastname;
		$emailid = $personData->emailid;
		$phonenumber = $personData->phonenumber;
		$subject = $personData->subject;
		$message = $personData->message;
		$created = time();
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//check details
		$insert = $db->prepare('INSERT INTO contact_enquiry (firstname, lastname, emailid, phonenumber, subject, message, created) VALUES (:firstname, :lastname, :emailid, :phonenumber, :subject, :message, :created)');
		   $insert->bindParam(':firstname', $firstname);
		   $insert->bindParam(':lastname', $lastname);
		   $insert->bindParam(':emailid', $emailid);
		   $insert->bindParam(':phonenumber', $phonenumber);
		   $insert->bindParam(':subject', $subject);
		   $insert->bindParam(':message', $message);
		   $insert->bindParam(':created', $created);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM contact_enquiry WHERE emailid = :emailid AND created = :created");
		   $check1->bindParam(':emailid', $emailid);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   //mail function start
		   date_default_timezone_set('Etc/UTC');
		
			// Import PHPMailer classes into the global namespace
			
			// Initialize PHP Mailer
			$mail = new PHPMailer(true); 
			$mail->isSendmail();
			// Set SMTP as mailing protocol
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Mailer = "smtp";

		    // Set required parameters for making an SMTP connection
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
		    $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
		    $mail->Port = 465;                                    // TCP port to connect to (587 is a standard port for SMTP)
		    $mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
		    $mail->Username = "info@jumboking.co.in";              // SMTP username
		    $mail->Password = "wmrhcuboxklnmeiq";                     // SMTP password

    		// Specify recipients
    		$mail->setFrom('info@jumboking.co.in', 'JumboKing');  
			$mail->addAddress('mansi.p@jumboking.co.in', 'Mansi Patel'); 
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'JumboKing Website - Contact Enquiry.';
			$mail->Body = 'Below is the enquiry details from the website jumboking.in<br/><br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Subject:</strong> <br/>'.$subject.'<br/><br/><strong>Message:</strong> <br/>'.$message.'<br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			$mail->AltBody = 'Below is the enquiry details from the website<br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Subject:</strong> <br/>'.$subject.'<br/><br/><strong>Message:</strong> <br/>'.$message.'<br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				$emailsend = '0';
			} else {
			//echo 'Message has been sent';
				$emailsend = '1';
			}
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['output'] = 'Message Send Successfully!<br/>Our team will get back to you shortly!';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['output'] = 'Error in Sending Message!<br/>Please try again!';
			}
	}

	if ($action == 'sendfeedback'){
		$firstname = $personData->firstname;
		$lastname = $personData->lastname;
		$emailid = $personData->emailid;
		$phonenumber = $personData->phonenumber;
		$choosetorate = $personData->choosetorate;
		$needtogetrating10 = $personData->needtogetrating10;
		$created = time();
		//echo $menuname.$submenun;
		$defaultvalue = '0';
		$statusn = '1';
		//check details
		$insert = $db->prepare('INSERT INTO feedback_messages (firstname, lastname, emailid, phonenumber, choosetorate, needtogetrating10, created) VALUES (:firstname, :lastname, :emailid, :phonenumber, :choosetorate, :needtogetrating10, :created)');
		   $insert->bindParam(':firstname', $firstname);
		   $insert->bindParam(':lastname', $lastname);
		   $insert->bindParam(':emailid', $emailid);
		   $insert->bindParam(':phonenumber', $phonenumber);
		   $insert->bindParam(':choosetorate', $choosetorate);
		   $insert->bindParam(':needtogetrating10', $needtogetrating10);
		   $insert->bindParam(':created', $created);
		   $insert->execute();
		   //check 
		   $check1 = $db->prepare("SELECT * FROM feedback_messages WHERE emailid = :emailid AND created = :created");
		   $check1->bindParam(':emailid', $emailid);
		   $check1->bindParam(':created', $created);
		   $check1->execute();
		   $count1 = $check1->rowCount();
		   //mail function start
		   date_default_timezone_set('Etc/UTC');
		
			// Import PHPMailer classes into the global namespace
			
			// Initialize PHP Mailer
			$mail = new PHPMailer(true); 
			$mail->isSendmail();
			// Set SMTP as mailing protocol
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Mailer = "smtp";

		    // Set required parameters for making an SMTP connection
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
		    $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
		    $mail->Port = 465;                                    // TCP port to connect to (587 is a standard port for SMTP)
		    $mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
		    $mail->Username = "info@jumboking.co.in";              // SMTP username
		    $mail->Password = "wmrhcuboxklnmeiq";                     // SMTP password

    		// Specify recipients
    		$mail->setFrom('info@jumboking.co.in', 'JumboKing');  
			$mail->addAddress('poonam.s@jumboking.co.in', 'Poonam'); 
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'JumboKing Website - Feedback.';
			$mail->Body = 'Below is the feedback details from the website jumboking.in<br/><br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Rate Jumbo King between 1 to 10*:</strong> <br/>'.$choosetorate.'<br/><br/><strong>What needs to be done to make you rate us 10 ?*</strong> <br/>'.$needtogetrating10.'<br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			$mail->AltBody = 'Below is the enquiry details from the website<br/><strong>First name:</strong> '.$firstname.'<br/><strong>Last name:</strong> '.$lastname.'<br/><strong>Email ID:</strong> '.$emailid.'<br/><strong>Phone number:</strong> '.$phonenumber.'<br/><br/><strong>Subject:</strong> <br/>'.$subject.'<br/><br/><strong>Message:</strong> <br/>'.$message.'<br/><br/><br/><br/><div style="font-size: 10px;">system powered by <a href="https://www.webinfinity.in" target="_blank">webinfinity</a></div>';
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				$emailsend = '0';
			} else {
			//echo 'Message has been sent';
				$emailsend = '1';
			}
		   if($count1 > 0){
				$json['success'] = true;
		    	$json['result'] = 1;
		    	$json['output'] = 'Feedback Send Successfully!<br/>Our team will get back to you shortly!';
			}else if ($count1 == 0){
				$json['success'] = false;
			    $json['result'] = 0;
			    $json['output'] = 'Error in Sending Feedback!<br/>Please try again!';
			}
	}

	if ($action == 'citieslist'){
		$stateID = $personData->stateID;
		
	}

	//encode JSON
	echo json_encode($json);
?>