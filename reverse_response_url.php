<?php
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "reverse_response.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);
?>
