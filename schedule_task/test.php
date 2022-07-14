<?php
$name = date('Y-m-d-H-i-s');
$myfile = fopen(__DIR__."/logs/$name.txt", "w");
fwrite($myfile, 'test');
fclose($myfile);
echo $name;