<?php
$stats = json_decode(file_get_contents('stats.json'), true);
$s = [];
foreach($stats as $country=>$ips){
$s[$country] = count($ips);
}
krsort($s);

foreach($s as $country=>$ips){
echo "$country - $ips<br>";
}