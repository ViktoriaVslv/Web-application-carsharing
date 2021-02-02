<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=autopark', 'root',"", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $_GET['display_blob'] = true;
    $cfg['ProtectBinary'] = FALSE;
    $cfg['ShowBlob'] = TRUE;
}
catch(Exception $e){
    print "Error: ".$e->getMessage();
    die();
}

//$mode = "DEVOP";
$mode = "PROD";

if ($mode == "DEVOP") {
    error_reporting(E_ALL);
} else {   
    error_reporting(0);
}
define("mode", $mode);
ini_set('display_errors', mode);
ini_set('log_errors', 'on');
ini_set('error_log',$_SERVER['DOCUMENT_ROOT']."/Include/log.log");


require_once 'include/smarty-3.1.35/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = 'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\templates';
$smarty->compile_dir = 'C:\Users\aser\Documents\NetBeansProjects\Autopark\include\smarty-3.1.35\libs\templates_c';

