<?php
exec('~/html/cgi-bin/copy_hits.cgi', $number);
print_r('Number of visitors: ');
print_r($number[0]);
exec('~/html/cgi-bin/update_hits.cgi');

$browser=strtolower($_SERVER["HTTP_USER_AGENT"]);
$f = fopen("browsers.txt", "r");
$ie = (int)fgets($f);
$ch = (int)fgets($f);
$sa = (int)fgets($f);
$ff = (int)fgets($f);
$ot = (int)fgets($f);
if(strpos($browser,"msie")) {$ie++;}
else if(strpos($browser,"chrome")) {$ch++;}
else if(strpos($browser,"safari")) {$sa++;}
else if(strpos($browser,"firefox")) {$ff++;}
else {$ot++;}
fclose($f);

$f = fopen("browsers.txt", "w");
fputs($f, $ie);
fputs($f, "\n");
fputs($f, $ch);
fputs($f, "\n");
fputs($f, $sa);
fputs($f, "\n");
fputs($f, $ff);
fputs($f, "\n");
fputs($f, $ot);
fclose($f);

echo "\n\nMost frequently used browser:";
if(max($ie, $ch, $sa, $ff, $ot)==$ie) {echo "\nIE";}
else if(max($ie, $ch, $sa, $ff, $ot)==$ch) {echo "\nCHROME";}
else if(max($ie, $ch, $sa, $ff, $ot)==$sa) {echo "\nSAFARI";}
else if(max($ie, $ch, $sa, $ff, $ot)==$ff) {echo "\nFIREFOX";}
else {echo "\nOTHER";}
?>
