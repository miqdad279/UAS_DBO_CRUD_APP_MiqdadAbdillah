<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$collection = (new MongoDB\Client)->UAS_MiqdadAbdillah->koperasi;
                
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $_GET['id'];
    unset($data['id']);
    $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)],['$set' => $data]);
    if ($result->getModifiedCount() > 0) {
        echo json_encode(array("status" => "success", "message" => "Data updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Data not found"));
    }
}