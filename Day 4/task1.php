<?php
$file = "input.txt";
$batchFile = fopen($file, "r") or die("Unable to open file!");
$batch = fread($batchFile, filesize($file));
fclose($batchFile);
$passports = explode("\n\n", $batch);
$valid_passports = 0;

foreach($passports as $index => $passport) {

    $passports[$index] = str_replace("\n", " ", $passport);
    $passports[$index] = explode(" ", $passports[$index]);
    foreach($passports[$index] as $key => $data) {
        $keys = explode(":", $data);
        if(isset($keys[1])) {
            $passports[$index][$keys[0]] = $keys[1];
            unset($passports[$index][$key]);
        }
    }
    if(isset($passports[$index]['ecl']) && !empty($passports[$index]['ecl']) &&
    isset($passports[$index]['pid']) && !empty($passports[$index]['pid']) &&
    isset($passports[$index]['eyr']) && !empty($passports[$index]['eyr']) &&
    isset($passports[$index]['hcl']) && !empty($passports[$index]['hcl']) &&
    isset($passports[$index]['byr']) && !empty($passports[$index]['byr']) &&
    isset($passports[$index]['iyr']) && !empty($passports[$index]['iyr']) &&
    // cid is optional
    //isset($passports[$index]['cid']) && !empty($passports[$index]['cid']) &&
    isset($passports[$index]['hgt']) && !empty($passports[$index]['hgt'])) {
        $valid_passports++;
    }
}
echo $valid_passports;
exit;