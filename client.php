<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Rapidmail\ApiClient\Client;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client($_ENV['RAPIDMAIL_API_USER'], $_ENV['RAPIDMAIL_API_PASS']);

$recipientsService = $client->recipients();

var_dump(
    $recipientsService->create(
        [
            'recipientlist_id' => $_ENV['RAPIDMAIL_RECIPIENTLIST'],
            'email' => $_ENV['RAPIDMAIL_TESTEMAIL'],
            'firstname' => 'Testfirst',
            'lastname' => 'Testlast',
            'zip' => '12345',
            'foreign_id' => '123-test',
            'extra1' => 'Test [ 123 ]',
        ],
        [
            'send_activationmail' => 'yes'
        ]
    )
);
