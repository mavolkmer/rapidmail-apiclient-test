<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$payload = [
    'recipientlist_id' => $_ENV['RAPIDMAIL_RECIPIENTLIST'],
    'email' => $_ENV['RAPIDMAIL_TESTEMAIL'],
    'firstname' => 'Testfirst',
    'lastname' => 'Testlast',
    'zip' => '12345',
    'foreign_id' => '123-test',
    'extra1' => 'Test [ 123 ]',
];

$ch = curl_init('https://apiv3.emailsys.net/v1/recipients?send_activationmail=yes');
curl_setopt($ch, CURLOPT_USERPWD, $_ENV['RAPIDMAIL_API_USER'] .':'. $_ENV['RAPIDMAIL_API_PASS']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
var_dump($response);

curl_close($ch);
