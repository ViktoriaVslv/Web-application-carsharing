<?php

function initTravel($page, $db) {

    try {
        $stmt = $db->prepare('SELECT function,file,template FROM pages WHERE name=?');
        $stmt->execute([$page]);
        $travelParams = $stmt->fetchAll();
        writeToLog("bd", "Получение функции, файла, шаблона, для действия ".$page);
      
    } 
    catch (Exception $ex) {
        print "Error: ".$ex->getMessage();
        writeToLog("bd", "Ошибка при получении функции, файла, шаблона, для действия ".$page);
        die();
    }
    
 return $travelParams;
}
function selectAllNotes($name, $db){
    try{
        $query = 'SELECT * FROM '.$name;
        $stmt = $db->prepare($query);
        $stmt->execute();
        $notes = $stmt->fetchAll();
        writeToLog("bd", "Выборка всех записей из таблицы ".$name);
    }
    catch (Exception $ex) {
        print "Error: ".$ex->getMessage();
        writeToLog("bd", "Ошибка при выборке всех записей из таблицы ".$name);
        die();
    }
    return $notes;
}

function deleteNote($name,$idName, $id, $db){
    session_start();
    if($_SESSION['role'] == "Admin"){
        $query = 'DELETE FROM '.$name.' WHERE '.$idName.' = ?';
        $stmt = $db->prepare($query);
        $stmt= $stmt->execute([$id]);
        writeToLog("bd", "Удаление записи из ".$name." где id = ".$id);
       
        return 0;
    }
    else{
        writeToLog("bd", "Пользователь с правами ".$_SESSION['role']."получил доступ на удаление");
        return 10;
    }
   
}

function getId($name){
    $filed = showColumns($name);
    writeToLog("bd", "Получения названия столбцов из ".$name);
    return $filed[0][0];
}
function getIndexMul($name){
    global $db;
    $filed = showColumns($name);   
    for($i=0; $i < count($filed); $i++){
        if($filed[$i][3]=="MUL"){
            $index[]=$i;
        } 
    writeToLog("bd", "Получение связанных индексов из ".$name);
    }
    return $index;
}
function getInfo($name, $id){
    global $db;
    $idName = getId($name);
    $query = 'SELECT * FROM '.$name.' WHERE '.$idName.'= ?';
    writeToLog("bd", "Получение записи из ".$name." где id = ".$id);
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $info = $stmt->fetchAll();
    
    return $info;
}
function changeNote($name, $db, $all){
    
    session_start();
    if($_SESSION['role'] == "Admin"){
        $fields = showColumns($name);

        $query = 'UPDATE '.$name.' SET ';

        for ($x = 1; $x < count($fields); $x++) {
            $query = $query."`";
            $query = $query.$fields[$x][0];
            $query = $query."`='";
            $query = $query.$all["p".$x];
            $query = $query."'";
            if ($x != count($all) - 1) {
                $query = $query.', ';
            }
        }

        $query = $query." WHERE `".$fields[0][0]."`=?";

        $stmt = $db->prepare($query);
        $stmt->execute([$all["p0"]]);
        writeToLog("bd", "Изменение записи из ".$name." где id =".$all["p0"],$all);
        
        return 0;
    }
    else{
        writeToLog("bd", "Пользователь с правами ".$_SESSION['role']."получил доступ на изменение");
        return 10;
    }
    
}

function addNote($name, $db, $all){
    
    session_start();
    
    if($_SESSION['role'] == "Admin"){
        
        $nameFields= showColumns($name);
        for ($x = 1; $x < count($nameFields); $x++) {
            $nameFields1[$x] = $nameFields[$x][0]; 
            $fieldsVal[$x] = ":".$nameFields[$x][0]; 
        }
        $nameTxt = implode( ', ', $nameFields1 );
        $valFieldsTxt = implode( ', ', $fieldsVal );
        $query = "INSERT INTO " . $name . " ({$nameTxt}) VALUES ({$valFieldsTxt})";

        $stmt = $db->prepare($query);
        $mass = array();
        for ($x = 1; $x < count($nameFields); $x++) {
            $mass[$nameFields[$x][0]] = $all["p".$x];
        }
        $stmt->execute($mass);

        writeToLog("bd", "Добавление записи в ".$name, $mass);
 
        return 0;
    }
    else{
        writeToLog("bd", "Пользователь с правами ".$_SESSION['role']."получил доступ к добавлениею");
        return 10;
    }
}

function getKeysCount($name, $db){
    $query = 'SHOW INDEX FROM '.$name;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $keys = $stmt->fetchAll();
    writeToLog("bd", "Просмотр значения индексов в таблице ".$name);
    return count($keys)-1;
}

function getConnections($name, $db){
    $query = "SELECT parent, child, fieldP, fieldC, idP, idC FROM `connections` WHERE child = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$name]);
    $foreign = $stmt->fetchAll();
    writeToLog("bd", "Получение связей для таблицы ".$name);
    return $foreign;
}

function joinTable($foreign,$db){
    
    $t1 = $foreign[1];
    $t2 = $foreign[0];
    $query = "SELECT ". $foreign[1].".*".", ".$foreign[0].".".$foreign[2]." FROM ".$foreign[1]." LEFT JOIN "
            .$foreign[0]." ON ".$foreign[1].".".$foreign[3]." = ".$foreign[0].".".$foreign[4]." WHERE "
            .$foreign[1].".".$foreign[3]." = ".$foreign[0].".".$foreign[4]." ORDER BY ".$foreign[5];

    $stmt = $db->prepare($query);
    $stmt->execute();
    $foreign = $stmt->fetchAll();
    
    for($i=0; $i < count($foreign); $i++){

        $col[] = $foreign[$i][count($foreign[0])/2-1];
    }
    writeToLog("bd", "Объединенный запрос для таблиц ".$t1.", ".$t2);
    return $col;
    
}

function getList($nameParent, $idP, $field, $db){
    
    $query = "SELECT ".$field.", ".$idP." FROM ".$nameParent;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fieldContent = $stmt->fetchAll();
    writeToLog("bd", "Получение связанных полей для ".$nameParent);
    return $fieldContent;
}

function showColumns($name){
    global $db;
    $query = 'SHOW COLUMNS FROM '.$name;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $field = $stmt->fetchAll();
    writeToLog("bd", "Просмотр название столбцов в таблице ".$name);
    return $field;
}

function actionNames() {
//не используется
    global $db;
    $query = 'SELECT name FROM pages';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $field = $stmt->fetchAll();
    return $field;

}

function isUser($login) {
    global $db;
    $foreign = '';
    $query = 'SELECT * FROM `users` WHERE login = ?';
    $stmt = $db->prepare($query);
    $stmt->execute([$login]);
    $foreign = $stmt->fetchAll();
    writeToLog("bd", "Получение данных о пользователе ".$login,$foreign);
    return $foreign;
    
    
}

function banCorrection($status, $login){
    global $db;
    $query = 'UPDATE `users` SET baned = ? WHERE login= ?';
    writeToLog("bd", "Изменение бана на ".$status." для пользователя ".$login);
    $stmt = $db->prepare($query);
    $stmt->execute([$status, $login]);
    
}