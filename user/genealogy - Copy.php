<?php
    error_reporting(E_ALL);
    include("../includes/db/database.php");
    session_start();
    $userid = $_SESSION['userid'];
    if($userid > 0){

    }else{
        header('location: '.$path.'login');
    }

    //get details from the db 
    $staffd = $db->prepare("SELECT * FROM consumer WHERE consumerid = :consumerid AND status = :status");
    $staffd->bindParam(":consumerid", $userid);
    $staffd->bindParam(":status", $status);
    $staffd->execute();

    //fetch detail
    $fetchstaff = $staffd->fetch(PDO::FETCH_ASSOC);
    $consumerfname = $fetchstaff['consumerfname'];
    $consumerlname = $fetchstaff['consumerlname'];
    $consumeruniqueid = $fetchstaff['uniqueid'];
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo $path; ?>">
    <meta charset="utf-8">
    <meta name="author" content="Ajit Singh">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $path; ?>images/favicon.png">
    <!-- Page Title  -->
    <title><?php echo $website_name; ?> User List</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=1.4.0">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo $path; ?>js/default.js"></script>
</head>
<?php
    $getuserlist = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid AND status = :status");
    $getuserlist->bindParam(":nomineeid", $consumeruniqueid);
    $getuserlist->bindParam(":status", $status);
    $getuserlist->execute();
    //count 
    $usercount = $getuserlist->rowCount(); 
?>
<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php
                include("common/sidebar.php"); 
            ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php
                    include("common/header.php"); 
                ?>
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Genealogy</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <?php echo $usercount; ?> users.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                	<div class="verticals twelve">
										<section class="management-tree">
											<div class="mgt-container">
												<div class="mgt-wrapper">
													<div class="mgt-item">
														<?php
															//check details now 
															$usercode = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :consumerid AND status = :status");
															$usercode->bindParam(":consumerid", $consumeruniqueid);
															$usercode->bindParam(":status", $status);
															$usercode->execute();
															//check count 
															$ucount = $usercode->rowCount();
															//echo $ucount;
														?>
														<!-- user basic level starts -->
														<div class="mgt-item-parent">
															<div class="person">
																<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																<p class="name"><?php echo $consumerfname.' '.$consumerlname;?></p>
															</div>
														</div>
														<!-- user basic level ends -->
														<!-- level starts -->
														<div class="mgt-item-children">
															<!-- now count total below him starts -->
															<?php
																//check details 
																$checkdtnow = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid ASC limit 0,3");
																$checkdtnow->bindParam(":nomineeid", $consumeruniqueid);
																$checkdtnow->execute();
																//count 
																$checkcount = $checkdtnow->rowCount();
																while($fetchcount = $checkdtnow->fetch(PDO::FETCH_ASSOC)){
																	$fname = $fetchcount['consumerfname'];
																	$funiqueid = $fetchcount['uniqueid'];
																	?>
																	<div class="mgt-item-child">
																		<div class="mgt-item">
																			<div class="mgt-item-parent">
																				<div class="person">
																					<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																					<p class="name"><?php echo $fname;?></p>
																				</div>
																			</div>
																			<!-- level starts -->
																			<div class="mgt-item-children">
																				<!-- now count total below him starts -->
																				<?php
																					//check details 
																					$checkdtnown = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid ASC limit 0,3");
																					$checkdtnown->bindParam(":nomineeid", $funiqueid);
																					$checkdtnown->execute();
																					//count 
																					$checkcountn = $checkdtnown->rowCount();
																					if($checkcountn > 0){
																					while($fetchcountn = $checkdtnown->fetch(PDO::FETCH_ASSOC)){
																						$fnamen = $fetchcountn['consumerfname'];
																						?>
																						<div class="mgt-item-child">
																							<div class="mgt-item">
																								<div class="mgt-item-parent">
																									<div class="person">
																										<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																										<p class="name"><?php echo $fnamen;?></p>
																									</div>
																								</div>
																							</div>
																						</div>
																						<?php 
																					}
																				  }else{
																			?>
																			           <div class="mgt-item-child">
																							<div class="mgt-item">
																								<div class="mgt-item-parent">
																									<div class="person">
																										<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																										<p class="name">blank</p>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="mgt-item-child">
																							<div class="mgt-item">
																								<div class="mgt-item-parent">
																									<div class="person">
																										<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																										<p class="name">blank</p>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div class="mgt-item-child">
																							<div class="mgt-item">
																								<div class="mgt-item-parent">
																									<div class="person">
																										<img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
																										<p class="name">blank</p>
																									</div>
																								</div>
																							</div>
																						</div>
																			<?php	  	
																				  }
																				?>
					                                                            <!-- now count total below him ends -->
																			</div>
																			<!-- level ends -->
																		</div>
																	</div>
																	<?php 
																}
															?>
                                                            <!-- now count total below him ends -->
														</div>
														<!-- level ends -->
													</div>

												</div>
											</div>
										</section>
									</div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <?php
                    include("common/footer.php"); 
                ?>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=1.4.0"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=1.4.0"></script>
</body>

</html>