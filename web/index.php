<?php
include('config.php');
include $_SERVER['DOCUMENT_ROOT']."/Include/database.php";
include $_SERVER['DOCUMENT_ROOT']."/Include/filtration.php";
include $_SERVER['DOCUMENT_ROOT']."/Include/journaling.php";
 

if (isset($_POST['page'])) {
  
    $page = htmlspecialchars($_POST['page']);
    $all = $_POST;
    if (isPage()) {
        $travelParams = initTravel($page, $db);
        $function = $travelParams[0][0];
        $file = $travelParams[0][1];
        $tpl = $travelParams[0][2];
  
        if (file_exists($_SERVER['DOCUMENT_ROOT']."/Include/".$file) && file_exists($_SERVER['DOCUMENT_ROOT']."/web/templates/".$tpl)) { 
            require_once $_SERVER['DOCUMENT_ROOT']."/Include/".$file;
            if (function_exists($function)) {
                $wrongFields = array();
                $wrongFieldsFlag = FALSE;
                if (allFilter()) {
                    $function($tpl, $all);
                    writeToLog("validation", "валицадия успешна:" .$function. ", ".$file.", ".$tpl);
                    writeToLog("validation", "вход логин:" .$_SESSION['login']. ", роль: ".$_SESSION['role']);
        
                }
                else {  
                    if (!$wrongFieldsFlag) {
                        
                        if ($function == 'enter') {
                            $tpl = 'login.tpl';
                            showEnter($tpl);
                            writeToLog("validation", "неуспешная авторизация");
                        }
                        writeToLog("validation", "валицадия не успешна:".$all['tabName'].", " .$function. ", ".$file.", ".$tpl);
                    } 
                    else {
                        writeToLog("validation", "валицадия не успешна:".$all['tabName'].", " .$function. ", ".$file.", ".$tpl);
                        if ($function == 'insert') {
                            $function = 'viewAdd';
                            $tpl = 'newNote.tpl';
                        }
                        if ($function == 'change') {
                            $function = 'show';
                            $tpl = 'newNote.tpl';
                            $_POST["flag"]="Submit";
                            $all = $_POST;      
                        }
                        $function($tpl, $all);
                    }        
                }
            }
        }
    }
}
elseif (isset($_POST['page1'])) {
    session_start();
    $_SESSION = array();
    setcookie('login',"",-1);
    setcookie('pass',"", -1);
    $smarty->display('login.tpl');  
}
else{
    require_once $_SERVER['DOCUMENT_ROOT']."/Include/view.php";
    cookies();
    
}



