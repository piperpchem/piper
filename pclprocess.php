<?php
$ip = $_SERVER['REMOTE_ADDR'];
$keys = array('fullname','email', 'institution', 'join', 'experiment');
$csv_line = array();
array_push($csv_line, time());
foreach($keys as $key){
    array_push($csv_line,'' . $_GET[$key]);
}
array_push($csv_line, $_SERVER['REMOTE_ADDR']);
$fname = 'pclform-responses.csv';
$fcon = fopen($fname,'a');
fputcsv($fcon, $csv_line);
fclose($fcon);

$experiment = $_GET['experiment'];
header("Location: https://drive.google.com/file/d/".$experiment."/preview");
?>

