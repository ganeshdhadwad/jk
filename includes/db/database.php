<?php
error_reporting(0);

/* Database config */
$db_host		= 'localhost';
$db_user		= 'padmin';
$db_pass		= 'root';
$db_database	= 'jk';
$db_encoding    = 'utf8'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$db_encoding));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//define base url
$path = "/jk/";

//define files url
$assets = "/jk/assets/";

//define theme url
$themes = "/jk/themes/";

//define video url
$tvideo = "/jk/staff/training/videos/";

//upload path
$uploads = "uploads/";

$website_name = "Indian Burger | Jumboking";

$company_name = "Jumboking Foods Pvt. Ltd.";

$year = date('Y');

$status = '1';

$deliverycharge = '10';

$version = '1.0.0';

$currency = '₹ ';

$useru = '1';

$vendor = '2';

$staff = '3';

$admin = '4';

$author = 'webinfinity';

$jumbokingcustomercarenumber = '022 – 2927 1286 / 2927 1357';

$jumbokingcustomeremailid = 'mansi.p@jumboking.co.in';

$jumbokingcompanyaddress = '73, Virwani Industrial Estate, W.E.Highway, Goregaon (East), Mumbai 400 063.';

$fburl = 'https://www.facebook.com/';

$twurl = 'https://www.twitter.com/';

$instaurl = 'https://www.instagram.com/';

$youtubeurl = 'https://www.youtube.com/';

function short_str($str, $max = 50) {
    $str = trim($str);
    if (strlen($str) > $max) {
        $s_pos = strpos($str, ' ');
        $cut = $s_pos === false || $s_pos > $max;
        $str = wordwrap($str, $max, ';;', $cut);
        $str = explode(';;', $str);
        $str = $str[0] . '...';
    }
    return $str;
}

?>