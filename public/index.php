<?php
require_once '../app/bootstrap.php';
// require_once "../vendor/autoload.php";
// Init Core Library
$init = new Core;



// use Google\Cloud\Storage\StorageClient;

// try {
//   $storage = new StorageClient([
//     'keyFilePath' => APPROOT . '\dams-339416-85c099923f79.json',
//   ]);

//   $bucketName = 'dams-bucket';
//   $bucket = $storage->bucket($bucketName);
//   if (!$bucket->exists()) {
//     $response = $storage->createBucket($bucketName);
//     echo "Your Bucket $bucketName is created successfully.";
//   }

//   // $bucketName = 'dams-bucket';
//   // $fileName = APPROOT . "\uploads\\Design Patterns.pdf";
//   // $bucket = $storage->bucket($bucketName);
//   // $object = $bucket->upload(
//   //   fopen($fileName, 'r')
//   // );
// } catch (Exception $e) {
//   echo $e->getMessage();
// }