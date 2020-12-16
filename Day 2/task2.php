<?php
$file = "input.txt";
$myfile = fopen($file, "r") or die("Unable to open file!");
$data = fread($myfile,filesize($file));
fclose($myfile);

$data = explode("\n", $data);
$valid_passwords = 0;
foreach($data as $index => $account) {
    $data[$index] = explode(" ", $account);
    if(isset($data[$index][1])) {
        $data[$index][1] = str_replace (":", "", $data[$index][1]);
        $data[$index][3] = explode("-", $data[$index][0]);
        $length = substr_count($data[$index][2], $data[$index][1]);
        $start = 0;
        $positions = [];
        while(($pos = strpos(($data[$index][2]),$data[$index][1], $start)) !== false) {
            $positions[] = $pos+1;
            $start = $pos+1;
        }
        if((in_array($data[$index][3][0], $positions) && !in_array($data[$index][3][1], $positions)) ||
        (in_array($data[$index][3][1], $positions) && !in_array($data[$index][3][0], $positions))) {
            $valid_passwords++;
        }
    }
}
echo "Valid passwords: ".$valid_passwords;
exit;