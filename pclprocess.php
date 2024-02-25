<?php

$csv_line = array();
//$timestamp = time();
$timestamp = date('Ymd H:i:s');
array_push($csv_line, $timestamp);
// form data
$keys = array('fullname', 'email', 'institution', 'join', 'expt');
foreach($keys as $key){
    array_push($csv_line,'' . $_GET[$key]);
}
$ip = $_SERVER['REMOTE_ADDR']; // ip of submittor
array_push($csv_line, $ip);

// write it all to csv
$fname = 'pclresponses.csv';
if(file_exists($fname)) {
    $fh = fopen($fname,'a');
} else {
    $fh = fopen($fname, 'w');
}
fputcsv($fh, $csv_line);
fclose($fh);

// look up google id based on experiment name
$nickname = $_GET['expt'];
$foundit = false;
if (($fp = fopen("pclexptlinks.csv", "r")) !== false) {
    while (($row = fgetcsv($fp)) !== false) {
        if($row[0] === $nickname) {
            $foundit = true;
            //echo 'Found ' . $row[0] . ': ' . $row[1] . "<br>"; //debugging
            $tmp = explode('/', $row[1]); //splits google file url on "/"
            $googleID = $tmp[5]; //echo '<br>' . $googleID;
        }
    }
    fclose($fp);
}
if ($foundit === false) {
    exit("Sorry, didn't find the file for $nickname");
}

//$gID = $_GET['gID']; // value of url parameter
//echo json_encode($csv_line);
//echo '<br>'.$goggleID;
header("Location: https://drive.google.com/file/d/".$googleID."/preview");

?>
