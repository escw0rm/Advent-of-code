<?php
$file = "input.txt";
$myfile = fopen($file, "r") or die("Unable to open file!");
$data = fread($myfile,filesize($file));
fclose($myfile);

$data = explode("\n", $data);
$tobogganPosX = 1;
$trees = 0;
unset($data[sizeof($data)-1]);
foreach($data as $index => $d) {
    $currentPos = $tobogganPosX;
    if($index != 0)
    $currentPos--;
    $tobogganPosX += 7;
    $station = 0;
    for($currentPos;$currentPos<$tobogganPosX;$currentPos++) {
        if($currentPos > 30) {
            $currentPos = 0;
            $tobogganPosX = $tobogganPosX-31;
                if($d[($currentPos)] == "#" && $station == 0) {
                        $data[$index][($currentPos)] = "X";
                        $trees++;
                }else{
                    // $data[$index][($currentPos)] = "O";
                }
        }else{
                if($d[($currentPos)] == "#" && $station == 0) {
                        $data[$index][($currentPos)] = "X";
                        $trees++;
                }else{
                    // $data[$index][($currentPos)] = "O";
                }
        }
        $station++;
    }
}
var_export($data);
echo $trees;
exit;