<?php
$file = "input.txt";
$myfile = fopen($file, "r") or die("Unable to open file!");
$data = fread($myfile,filesize($file));
fclose($myfile);

$data = explode("\n", $data);
$tobogganPosX = 1;
$trees = 0;
unset($data[sizeof($data)-1]);
$skip = true;
foreach($data as $index => $d) {
    if($skip) { 
        $currentPos = $tobogganPosX;
        if($index != 0) 
        $currentPos--;
        $tobogganPosX += 1;
        $station = 0;
        for($currentPos;$currentPos<$tobogganPosX;$currentPos++) {
            if($currentPos > 30) {
                $currentPos = 0;
                $tobogganPosX = $tobogganPosX-31;
                if($data[$index][($currentPos)] == "#" && $station == 0) {
                        $data[$index][($currentPos)] = "X";
                        $trees++;
                }else{ 
                }
            }else{
                if($data[$index][($currentPos)] == "#" && $station == 0) {
                        $data[$index][($currentPos)] = "X";
                        $trees++;
                }
            }
            $station++;
        }
        $skip = false;
    }else{
        $skip = true;
    }
}
var_export($data);
echo $trees;
exit;