<?php
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "transactionstatus.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);
?>
