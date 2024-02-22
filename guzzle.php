<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\RequestOptions;
use Rapidmail\ApiClient\Http\ThrottleMiddleware;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$stack = HandlerStack::create();
$stack->push(
    ThrottleMiddleware::getInstance(
        1,
        10
    ), 
    'throttle'
);

$client = new Client([
    'base_uri' => 'https://apiv3.emailsys.net/v1/',
    'handler' => $stack,
    RequestOptions::HEADERS => [
        'Accept' => 'application/json',
        'User-Agent' => 'guzzle-test-client-v1 ('. PHP_VERSION . ')',
    ]
]);

$response = $client->request(
    'POST',
    'recipients',
    [
        'auth' => [$_ENV['RAPIDMAIL_API_USER'], $_ENV['RAPIDMAIL_API_PASS']],
        RequestOptions::QUERY => [
            'send_activationmail' => 'yes',
        ],
        RequestOptions::JSON => [
            'recipientlist_id' => $_ENV['RAPIDMAIL_RECIPIENTLIST'],
            'email' => $_ENV['RAPIDMAIL_TESTEMAIL'],
            'firstname' => 'Testfirst',
            'lastname' => 'Testlast',
            'zip' => '12345',
            'foreign_id' => '123-test',
            'extra1' => 'Test [ 123 ]',
        ],
    ]
);


var_dump($response);

