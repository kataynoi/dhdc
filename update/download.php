<?php
//
$new_version = "dhdc_update_20150305_2";
$source = "http://utehn.plkhealth.go.th/dhdc/zip/$new_version.zip";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSLVERSION,3);
$data = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

$destination = "./update.zip";
$file = fopen($destination, "w+");
fputs($file, $data);
fclose($file);

echo $destination;

