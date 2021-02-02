<?php

function allFilter() {
    $actNames = ["auto", "city", "clients", "orders", "workers", "model1", "add", "delete", "show", "insert", "change", "showMenu", "enter", "users", "ban"];
 
    
    $ultimateFlag = TRUE;
    global $wrongFields1;
    for ($i = 0; $i < 2; $i++) {
        $wrongFields1[$i] = "";
    }
    $post = $_POST;
    if (isset($post['page'])) {
        unset($post['page']);
    }
    if (isset($_POST['tabName'])) {
        unset($post['tabName']);
        $ultimateFlag = FALSE;
        for ($i = 0; $i < count($actNames); $i++) {
            if ($actNames[$i] == $_POST['tabName']) {
                $ultimateFlag = TRUE;
                break;
            }
        }
        if(!$ultimateFlag){
            writeToLog("validation", "таблица не существует в бд ".$_POST['tabName']);
        }
    }
    if (isset($_POST['pc'])) {
        unset($post['pc']);
        $ultimateFlag = FALSE;
        $options = array('flags'=>"","options"=>array());
        if ($_POST['pc'] =='0') {
            $ultimateFlag = TRUE;
        }
        if (filter_input(INPUT_POST,'pc', FILTER_VALIDATE_INT, $options)) {
            $ultimateFlag = TRUE;
        }
        if(!$ultimateFlag){
            writeToLog("validation", "pc не число, таблица".$_POST['tabName']);
        }
    }
    
    if (isset($_POST['login'])) {
       
        $ultimateFlag = FALSE;
        $rr = filter_input(INPUT_POST,'login', FILTER_SANITIZE_STRING);
        
        if($rr == $_POST['login']){
            $ultimateFlag = TRUE; 
        }
        else {    
            $wrongFields1[0] = 'Неверный формат строки';
            writeToLog("validation", "подозрительные символы в логине ".$_POST['login']);
        }
        if($rr == ""){
            $ultimateFlag = FALSE;
            $wrongFields1[0] = 'Пустое поле';
            writeToLog("validation", "пустой логин при входе");
        }
        unset($post['pass']);
    }
    if (isset($_POST['pass'])) {
        $ultimateFlag = FALSE;
        $rr = filter_input(INPUT_POST,'pass', FILTER_SANITIZE_STRING);
        
        if($rr == $_POST['pass']){
            $ultimateFlag = TRUE; 
        }
        else {    
            $wrongFields1[1] = 'Неверный формат строки';
            writeToLog("validation", "подозрительные символы в пароле ".$_POST['pass']."пользователь ".$_POST['login']);
        }
        if($rr == ""){
            $ultimateFlag = FALSE;
            $wrongFields1[1] = 'Пустое поле';
            writeToLog("validation", "пустой пароль при входе пользователя ".$_POST['login']);
        }
        unset($post['pass']);  
       
    }
    if (isset($_POST['pc_num'])) {
        unset($post['pc_num']);
        $ultimateFlag = FALSE;
        $options = array('flags'=>"","options"=>array());
        if ($_POST['pc_num'] =='0') {
            $ultimateFlag = TRUE;
        }
        if (filter_input(INPUT_POST,'pc_num', FILTER_VALIDATE_INT, $options)) {
            $ultimateFlag = TRUE;
        }
        if(!$ultimateFlag){
            writeToLog("validation", "pc_num не число, таблица".$_POST['tabName']);
        }
        
    }
    if (isset($_POST['id'])) {
        unset($post['id']);
        $ultimateFlag = FALSE;
        $options = array('flags'=>"","options"=>array());
        if ($_POST['id'] =='0') {
            $ultimateFlag = TRUE;
        }
        if (filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT, $options)) {
            $ultimateFlag = TRUE;
        }
        if(!$ultimateFlag){
            writeToLog("validation", "id не число, таблица".$_POST['tabName']);
        }
    }
    if (isset($_POST['flag'])) {
        unset($post['flag']);
        $ultimateFlag = FALSE;
        if ($_POST['flag']=="hidden" || $_POST['flag']=="Submit") {
            $ultimateFlag = TRUE;
        }
        else {
            writeToLog("validation", "Ошибка флага, таблица".$_POST['tabName']);
        }
    }
    if (isset($_POST['rt'])) {
        unset($post['rt']);
        unset($_POST['rt']);
    }
    if (isset($_POST['yu'])) {
        unset($post['yu']);
        unset($_POST['yu']);
    }
    
    global $wrongFields;
    for ($i = 0; $i < count($post); $i++) {
        $wrongFields[$i] = "";
    }
    if (isset($_POST['p0']) && isset($_POST['tabName'])) {
        
        for ($i = 0; $i < count($post); $i++) {
            $rr = filter_input(INPUT_POST, "p".$i, FILTER_SANITIZE_STRING);
            if ($rr != $_POST["p".$i]) {
                $ultimateFlag = FALSE;
                $wrongFields[$i] = 'Неверный формат строки';
            }
        }
        if($_POST['tabName'] != $_POST['page']){
            for ($i = 1; $i < count($post); $i++) {
                $rr = filter_input(INPUT_POST, "p".$i, FILTER_SANITIZE_STRING);
                if ($rr == ""){
                    $ultimateFlag = FALSE;
                    $wrongFields[$i] = 'Пустое поле';
                }
            }    
        }
        if($_POST['tabName'] == "model1" && $_POST['p3'] != "" && $_POST['p2']!=""){
            if(!filter_var($_POST['p3'], FILTER_VALIDATE_URL)){
                $ultimateFlag = FALSE;
                $wrongFields[3] = 'Неверный формат ссылки';
            }
            if(!filter_var($_POST['p2'], FILTER_VALIDATE_URL)){
                $ultimateFlag = FALSE;
                $wrongFields[2] = 'Неверный формат ссылки';
            }     
        }
        if($_POST['tabName']=="auto" && $_POST['p3']!="" && $_POST['p6']!=""){
            if(!filter_var($_POST['p3'], FILTER_VALIDATE_INT) && $_POST['p3']!="0") {
                $ultimateFlag = FALSE;
                $wrongFields[3] = 'Пробег должен быть положительным';
            }  
            if(!filter_var($_POST['p6'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
                $wrongFields[6] = 'Цена проката больше 0 должна быть';;
            } 
            if(!filter_var($_POST['p2'], FILTER_VALIDATE_INT) && $_POST['p2']!="0") {
                $ultimateFlag = FALSE;
            }
            if(!filter_var($_POST['p7'], FILTER_VALIDATE_INT) && $_POST['p7']!="0") {
                $ultimateFlag = FALSE;
            }
        }
        if($_POST['tabName']=="city" && $_POST['p2']!=""){
            if(!filter_var($_POST['p2'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
                $wrongFields[2] = 'Номер города должен быть больше 0';
            } 
        }
        if($_POST['tabName']=="workers" && $_POST['p5']!=""){
            if(!filter_var($_POST['p5'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
                $wrongFields[5] = 'Заработная плата должна быть больше 0';
            } 
        }
        if($_POST['tabName']=="clients" && $_POST['p6']!=""){
            if(!filter_var($_POST['p6'], FILTER_VALIDATE_INT) && $_POST['p6']<"0" && $_POST['p6'] >='100') {
                $ultimateFlag = FALSE;
                $wrongFields[6] = 'Скидка должна быть в диапазоне от 0 до 99';
            } 
        }
        if($_POST['tabName']=="orders" && $_POST['p4']!="" && $_POST['p5']!="" && $_POST['p6']!=""){
            
            if(!validateDate($_POST['p4'], $format = 'Y-m-d')){
                $ultimateFlag = FALSE;
                $wrongFields[4] = 'Неверный формат даты (2020-10-05)';
              
            }
            if(!validateDate($_POST['p5'], $format = 'H:i:s')){
                $ultimateFlag = FALSE;
                $wrongFields[5] = 'Неверный формат времени (10:40:00)';
                
            }
            if(!filter_var($_POST['p6'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
                $wrongFields[6] = 'Неверная продолжительность, больше 0';
            } 
            if(!filter_var($_POST['p1'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;             
            } 
            if(!filter_var($_POST['p2'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
            } 
            if(!filter_var($_POST['p3'], FILTER_VALIDATE_INT)) {
                $ultimateFlag = FALSE;
            } 
        }
    }
    
    global $wrongFieldsFlag;
    for ($i = 0; $i < count($wrongFields); $i++) {
        if ($wrongFields[$i] != "") {
            $wrongFieldsFlag = TRUE;
            //break;
            $mes = $wrongFields[$i]." (поле р".$i.") в таблице ".$_POST['tabName'];
            writeToLog("validation",$mes, $_POST['p'.$i]);
        }
    }
    
    return $ultimateFlag;
}

function isPage(){
    $ultimateFlag = TRUE;
    
    $actNames = ["auto", "city", "clients", "orders", "workers",
            "model1", "add", "delete", "show", "show1", "insert",
             "change", "showMenu", "enter", "users", "ban"];
    if (isset($_POST['page'])) {
        $ultimateFlag = FALSE;
        for ($i = 0; $i < count($actNames); $i++) {
            if ($actNames[$i] == $_POST['page']) {
                $ultimateFlag = TRUE;
                break;
            }
        }
    }
    return $ultimateFlag;
}

function validateDate($date, $format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

