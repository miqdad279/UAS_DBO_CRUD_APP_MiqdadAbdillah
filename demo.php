<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client;

$UAS_MiqdadAbdillah = $client->UAS_MiqdadAbdillah;

$result1 = $UAS_MiqdadAbdillah->createCollection('koperasi');
var_dump($result1);

?>