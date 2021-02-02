<?php

function writeToLog($log, $mes, $params = null) {
    $e = new Exception;
    $message = "[".date("Y-m-d H:i:s")."]".$mes;
    if (mode == "DEVOP") {
        
        echo $message;
        echo '<pre>';
        echo print_r($params, true).PHP_EOL;
        echo '</pre>';
        echo (htmlentities( $e->getTraceAsString()));
    }
    error_log($message.PHP_EOL, 3, $_SERVER['DOCUMENT_ROOT']."/web/log/".$log.".log");
    error_log(print_r($params, true).PHP_EOL, 3, $_SERVER['DOCUMENT_ROOT']."/web/log/".$log.".log");
    error_log($e->getTraceAsString(), 3, $_SERVER['DOCUMENT_ROOT']."/web/log/".$log.".log");
    
    error_log($message.PHP_EOL, 3, $_SERVER['DOCUMENT_ROOT']."/web/log/log.log");
  
}




