<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$collection = (new MongoDB\Client)->UAS_MiqdadAbdillah->koperasi;

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    if ($result->getDeletedCount() > 0) {
        echo json_encode(array("status" => "success", "message" => "Data deleted successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Data not found"));
    }
}