<?php
session_start();
error_reporting(E_ALL);
include("../includes/db/database.php"); 
$session_id = $_SESSION['staffid'];
$upath = "../uploads/";
$status = '1';
$created = time();
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
echo '22';
if(move_uploaded_file($tmp, $upath.$actual_image_name))
{
$insertimg = $db->prepare("INSERT INTO product_image (productimg, status, created) VALUES (:productimg, :status, :created)");
$insertimg->bindParam(':productimg', $actual_image_name);
$insertimg->bindParam(':status', $status);
$insertimg->bindParam(':created', $created);
$insertimg->execute();
echo "<div id='imgt'><img src='".$path."uploads/".$actual_image_name."' class='preview' id='imgpreview' imgname='".$actual_image_name."'></div>";
}
else
echo "failed";
}
else
echo "Image file size max 1 MB"; 
}
else
echo "Invalid file format.."; 
}
else
echo "Please select image..!";
exit;
}
?>