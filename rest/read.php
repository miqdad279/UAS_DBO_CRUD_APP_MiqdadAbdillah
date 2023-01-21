<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$collection = (new MongoDB\Client)->UAS_MiqdadAbdillah->koperasi;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    } else {
        $data = $collection->find()->toArray();
    }
    echo json_encode(array("status" => "success", "data" => $data));
}