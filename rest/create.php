<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$collection = (new MongoDB\Client)->UAS_MiqdadAbdillah->koperasi;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $collection->insertOne($data);
    echo json_encode(array("status" => "success", "data" => $result->getInsertedId()));
}