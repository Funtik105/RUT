<?php
$url = "109.120.181.142/api/locations";

$content = json_decode($url, true);


$curl = curl_init($url);
$resp = curl_exec($curl);
?>
