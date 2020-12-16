<?php
$file = "input.txt";
$myfile = fopen($file, "r") or die("Unable to open file!");
$numbers = fread($myfile,filesize($file));
fclose($myfile);

$numbers = explode("\n", $numbers);
echo "Calculating... \r\n";
$answers = [];
do {
    $indexes = array_rand($numbers, 2);
} while (((int)((int)$numbers[$indexes[0]] + (int)$numbers[$indexes[1]]) !== 2020));
echo (int)$numbers[$indexes[0]]."+".(int)$numbers[$indexes[1]]."=".(int)($numbers[$indexes[0]]+$numbers[$indexes[1]])."\r\n";
echo (int)$numbers[$indexes[0]]."*".(int)$numbers[$indexes[1]]."=".(int)($numbers[$indexes[0]]*$numbers[$indexes[1]])."\r\n";

echo "done";
        