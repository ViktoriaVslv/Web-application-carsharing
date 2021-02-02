<?php

function viewTab($tpl, $all){
    
    session_start();
    
   
    global $db;
    global $smarty;
    if (isset($all['tabName'])){
        $name = htmlspecialchars($all['tabName']);
    }
    else{
        if (isset($all['page'])){
            $name = htmlspecialchars($all['page']);
        }
        else{
            $name = 0;
        }
    }
    $notes = selectAllNotes($name, $db);
    
    $str = 0;
    switch ($name){
        case "auto":
            $head = ["№","Борт. номер","Модель","Пробег","КП","Гос.номер","Стоимость, мин","Город","Описание"];
            break;
        case "model1":
            $head = ["№","Название марки","Изображение","Сайт"];
            break;
        case "city":
            $head = ["№","Город","Номер региона"];
            break;
        case "clients":
            $head = ["№","Имя","Фамилия","Телефон","Водит. уд.", "Паспорт","Скидка"];
            break;
        case "workers":
            $head = ["№","Имя","Фамилия","Телефон","Паспорт","Зарплата"];
            break;
        case "orders":
            if($_SESSION['role']=="Auto"){
                for($i = 0; $i<count($notes);$i++) {
                    if($notes[$i][2]==$_SESSION['id']){
                        $deleteMarkers[$i] = 1;
                    }
                    else {
                        $deleteMarkers[$i] = 0;
                    }
                }
            }
            $head = ["№","Автомобиль","Клиент","Работник","Дата","Время","Продолжительность, мин"];
            break;
        case "users":
            $head = ["№","Логин","Роль"];
            $tmp = $notes;
            
            $str = -3;
            for ($i = 0; $i < count($notes);$i++){
                $notes[$i][2] =  $tmp[$i][3];
                $notes[$i][3] =  $tmp[$i][4];
            }
            break;
        default :
            break;
    }
    
    $keys = getKeysCount($name, $db);
    if($keys > 0){
        $index = getIndexMul($name);
        $foreign = getConnections($name, $db);
        for($x=0; $x < count($foreign); $x++){
            $col = joinTable($foreign[$x], $db);
            for($i=0; $i < count($col); $i++){
                $notes[$i][$index[$x]] = $col[$i];
            }
        }
    }
    
    if ($name == "orders" && $_SESSION['role']=="Auto") {
        $tmp = $notes;
        $notes = array();
        $count = 0;
        for($i = 0; $i<count($tmp);$i++){
            if($deleteMarkers[$i] == 1){
                $notes[$count] = $tmp[$i];
                $count = $count +1;
            }
        }
    }
   
    if (isset($all['pc'])){
       $ipc = htmlspecialchars($all['pc']);
    }
    
    else{
       $ipc = 0;
    }
    $pcI = $ipc;
    if (isset($all['pc_num'])){
        $pc_num = $all['pc_num'];
    }
    else{
        $pc_num = 5;
    }
    session_start();
    $pc = ceil((count($notes))/$pc_num);
    $end1= count($notes)-1;
    $end2 = count($notes[0])/2-1 + $str;
    $smarty->assign('notes', $notes);
    $smarty->assign('end1', $end1);
    $smarty->assign('role', $_SESSION['role']);
    $smarty->assign('end2', $end2);
    $smarty->assign('head', $head);
    $smarty->assign('name', $name);
    $smarty->assign('pc', $pc);
    $smarty->assign('pc_num', $pc_num);
    $smarty->assign('pcI', $pcI);
    $smarty->display($tpl);
}
function viewAdd($tpl, $all){
  
    global $db;
    global $smarty;
    global $wrongFields;
    
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
    }
    else{
       $name = 0;
    }
    
    switch ($name){
        case "auto":
            $title = "Новый автомобиль";
            $head = ["№","Борт. номер","Модель","Пробег","КП","Гос.номер","Стоимость, мин","Город","Описание"];
            break;
        case "model1":
            $title = "Новая модель";
            $head = ["№","Название марки","Изображение","Сайт"];
            break;
        case "city":
            $title = "Новый город";
            $head = ["№","Город","Номер региона"];
            break;
        case "clients":
            $title = "Новый клиент";
            $head = ["№","Имя","Фамилия","Телефон","Водит. уд.", "Паспорт","Скидка"];
            break;
        case "workers":
            $title = "Новый работник";
            $head = ["№","Имя","Фамилия","Телефон","Паспорт","Зарплата"];
            break;
        case "orders":
            $title = "Новый заказ";
            $head = ["№","Автомобиль","Клиент","Работник","Дата","Время","Продолжительность, мин"];
            break;
        default :
            break;

    }
    
    $info = getInfo($name, $id);
    $fields = getConnections($name, $db);
    $count = 0;
    for($x = 0; $x < count($fields); $x++){
        $nameParent = $fields[$x][0];
        $field = $fields[$x][2];
        $idP = $fields[$x][4];
        $tmp = getList($nameParent, $idP, $field, $db);
        for($i = 0; $i < count($tmp); $i++){
            $list[$i][$count]= $tmp[$i][0];
            $list[$i][$count+1] = $tmp[$i][1];         
        }
        $count += 2;
    }
    $index = getIndexMul($name);
    
    if (isset($all['pc'])){
       $pc = htmlspecialchars($all['pc']);
    }
    else{
       $pc = 0;
    }
     if (isset($all['pc_num'])){
        $pc_num = $all['pc_num'];
    }
    else{
        $pc_num = 5;
    }
    
    $end1= count($head)-1;
    $endList= count($list)-1;
    $smarty->assign('list', $list);
    $smarty->assign('endList', $endList);
    $smarty->assign('index', $index);
    $smarty->assign('end1', $end1);
    $smarty->assign('head', $head);
    $smarty->assign('name', $name);
    $smarty->assign('title', $title);
    $smarty->assign('pc', $pc);
    $smarty->assign('pc_num', $pc_num);
    $smarty->assign('info', $info);
    $smarty->assign('flag', "Submit");
    $smarty->assign('wrongFields', $wrongFields);
    $func = "insert";
    $smarty->assign('func', $func);
    $smarty->display($tpl);
      
}
function show($tpl, $all){
    
    global $db;
    global $smarty;
    global $wrongFields;
    if (isset($all['flag'])){
       $flag =  htmlspecialchars($all['flag']);
       
    }
    
    
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
    }
    else{
       $name = 0;
    }
    switch ($name){
        case "auto":
            $title = "Автомобиль";
            $head = ["№","Борт. номер","Модель","Пробег","КП","Гос.номер","Стоимость, мин","Город","Описание"];
            break;
        case "model1":
            $title = "Марка";
            $head = ["№","Название марки","Изображение","Сайт"];
            break;
        case "city":
            $title = "Город";
            $head = ["№","Город","Номер региона"];
            break;
        case "clients":
            $title = "Клиент";
            $head = ["№","Имя","Фамилия","Телефон","Водит. уд.", "Паспорт","Скидка"];
            break;
        case "workers":
            $title = "Работник";
            $head = ["№","Имя","Фамилия","Телефон","Паспорт","Зарплата"];
            break;
        case "orders":
            $title = "Заказ";
            $head = ["№","Автомобиль","Клиент","Работник","Дата","Время","Продолжительность, мин"];
            break;
        default :
            break;
    }
    
    if (isset($all['pc'])){
       $pc = htmlspecialchars($all['pc']);
    }
    else{
       $pc = 0;
    }
    
    if (isset($all['id'])){
       $id =  htmlspecialchars($all['id']);
    }
    else{
       $id =  htmlspecialchars($all['p0']);
    }

   
    if (isset($all['pc_num'])){
        $pc_num = $all['pc_num'];
    }
    else{
        $pc_num = 5;
    }
    
    $info = getInfo($name, $id);
    $fields = getConnections($name, $db);
    $count = 0;
    $index = getIndexMul($name);
    
    for ($x = 0; $x < count($fields); $x++){
        $nameParent = $fields[$x][0];
        $field = $fields[$x][2];
        $idP = $fields[$x][4];
        $tmp = getList($nameParent, $idP, $field, $db);
        for ($i = 0; $i < count($tmp); $i++){
            $list[$i][$count]= $tmp[$i][0];
            $list[$i][$count+1] = $tmp[$i][1];         
        }
        $count += 2;
    }
    
    for ($j = 0; $j < count($index); $j++) {
        for ($i = 0; $i < count($list); $i++){
            if($info[0][$index[$j]] == $list[$i][($j*2+1)]){
                $list1[] = $list[$i][$j*2];
                $tmp = $list[0][$j*2];
                $tmp1 = $list[0][$j*2+1];
                $list[0][$j*2] = $list[$i][$j*2];
                $list[0][$j*2+1] = $list[$i][$j*2+1];
                $list[$i][$j*2] = $tmp;
                $list[$i][$j*2+1] = $tmp1;
            }
        }
    }
   
    $end1= count($head)-1;
    $endList= count($list)-1;
    $smarty->assign('list', $list);
    $smarty->assign('list1', $list1);
    $smarty->assign('endList', $endList);
    $smarty->assign('index', $index);
    $smarty->assign('end1', $end1);
    $smarty->assign('wrongFields', $wrongFields);
    $smarty->assign('head', $head);
    $smarty->assign('name', $name);
    $smarty->assign('info', $info);
    $smarty->assign('flag', $flag);
 
    $smarty->assign('pc', $pc);
    $smarty->assign('title', $title);
    $smarty->assign('pc_num', $pc_num);
    $func = "change";
    $smarty->assign('func', $func);
    $smarty->display($tpl);
    
    
}
function delete($tpl, $all){
    global $db;
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
    }
    else{
       $name = 0;
    }
    $idName = getId($name);
    if (isset($all['id'])){
       $id =  htmlspecialchars($all['id']);
    }
    else{
       $id = 0;
    }
    if(deleteNote($name, $idName, $id,$db) == 10){
        showEnter("login.tpl");
    }
    else{
        viewTab($tpl, $all);
    }
    
    
}

function change($tpl, $all) {
    global $db;
    
    $post = $all;
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
       unset($all['tabName']);
    }
    else{
       $name = 0;
    }
    if (isset($all['page'])) {
        unset($all['page']);
    }
    if (isset($all['pc'])) { 
        unset($all['pc']);
        
    }
    if (isset($all['pc_num'])) {
        unset($all['pc_num']);
    }
    if (isset($all['yu'])) {
        unset($all['yu']);
    }
    if (isset($all['rt'])) {
        unset($all['rt']);
    }
    if(changeNote($name, $db, $all)== 10){
        showEnter("login.tpl");
        
    }
    else{ 
        viewTab($tpl, $post);
    }
    
    
   
    
}

function insert($tpl, $all){
    
    global $db;
    $post = $all;
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
       unset($all['tabName']);
    }
    else{
       $name = 0;
    }
    if (isset($all['page'])) {
        unset($all['page']);
    }
    if (isset($all['pc'])) {
        unset($all['pc']);
    }
    if (isset($all['pc_num'])) {
        unset($all['pc_num']);
    }
    if (isset($all['rt'])) {
        unset($all['rt']);
    }
    if (isset($all['yu'])) {
        unset($all['yu']);
    }
    if(addNote($name, $db, $all) == 10){
        showEnter("login.tpl");
        echo "bjh";
    }
    else{ 
        viewTab($tpl, $post);
        echo "qwerty";
    }

            
}

function showMenu($tpl, $all){
    global $smarty;
    session_start();
    if(empty($_SESSION['role'])){
        $_SESSION['role'] = "noAuto";
    }
    else {
        $tpl = "main.tpl";
    }
    
    $smarty->assign('role', $_SESSION['role']);
    $smarty->display($tpl);
}
function showEnter($tpl){

    global $smarty;
    global $wrongFields1;
    $smarty->assign('wrongFields1', $wrongFields1);
    $smarty->display($tpl);
}

function enter($tpl, $all){
    global $smarty;
    $data = isUser($all['login']);
    if(count($data) == 0){
        $tpl = "login.tpl";
        $error1 = "Нет такого пользователя";
        writeToLog("validation", "Попытка входа под логином".$all['login']);
        $smarty->assign('er', $error1);
    }
    else{
        $input = hash("sha256", $all['pass']); 
        if($data[0][2] != $input){
            $tpl = "login.tpl";
            $error2 = "Неверный пароль";
            writeToLog("validation", "Ввод неверного пароля пользователем ".$all['login']);
            $smarty->assign('er2', $error2);
        } 
        else {
            session_start();
            if(!$data[0][4]){
                $_SESSION['login'] = $all['login'];
                $_SESSION['id'] = $data[0][5];
                if ($data[0][3] == 1) {
                    $_SESSION['role'] = "Admin";
                }
                else {
                    $_SESSION['role'] = "Auto";
                }
                setcookie('login',$all['login'],time()+60*5);
                setcookie('pass',$input,time()+60*5);
            }
            else{
                $tpl = "login.tpl";  
                $error2 = "Вы внесены в черный список из-за нарушений правил сайта";
                writeToLog("validation", "Попытка входа пользователя всесенного в черный список ".$all['login']);
                $smarty->assign('er2', $error2);
            }
        }
    }
    $smarty->assign('role', $_SESSION['role']);
    $smarty->display($tpl);
}

function changeBan($tpl, $all) {
    
    
    global $db;
    $post = $all;
    if (isset($all['tabName'])){
       $name =  htmlspecialchars($all['tabName']);
       unset($all['tabName']);
    }
    else{
       $name = 0;
    }
    if (isset($all['page'])) {
        unset($all['page']);
    }
    if (isset($all['pc'])) {
        unset($all['pc']);
    }
    if (isset($all['pc_num'])) {
        unset($all['pc_num']);
    }
    if (isset($all['rt'])) {
        unset($all['rt']);
    }
    if (isset($all['yu'])) {
        unset($all['yu']);
    }
    
    session_start();
    $login = $all['login'];
    banCorrection($all['ban'], $login);
    
    viewTab($tpl, $post);
}

function  cookies(){
    global $db;
    
    global $smarty;
    if(count($_COOKIE)>1){
        
        session_start();
        
        $data = isUser($_COOKIE['login'], $_COOKIE['pass']);
        $_SESSION['login'] = $data[0][1];
        $_SESSION['id'] = $data[0][5];
        if ($data[0][3] == 1) {
            $_SESSION['role'] = "Admin";
        }
        else {
            $_SESSION['role'] = "Auto";
        }
        $smarty->assign('role', $_SESSION['role']);
        $smarty->display("main.tpl");
    }
    else{
        session_start();
        $_SESSION = array();
        $smarty->display('login.tpl');   
    }
}