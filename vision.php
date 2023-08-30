<?php
require 'vendor/autoload.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=./credentials/service-account.json');

$client = new ImageAnnotatorClient();
$image = file_get_contents('./sample.jpg');
$response = $client->imagePropertiesDetection($image);
$props = $response->getImagePropertiesAnnotation();

print('Properties:' . PHP_EOL);
foreach ($props->getDominantColors()->getColors() as $colorInfo) {
    printf('Score: %s' . PHP_EOL, $colorInfo->getScore());
    $color = $colorInfo->getColor();
    printf('Red: %s' . PHP_EOL, $color->getRed());
    printf('Green: %s' . PHP_EOL, $color->getGreen());
    printf('Blue: %s' . PHP_EOL, $color->getBlue());
    print(PHP_EOL);
}
$client->close();
