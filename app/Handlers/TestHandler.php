<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\KafkaConsumerMessage;
use App\Services\EmailService;

class TestHandler
{
    public function __construct()
    {
        $this->EmailService = new EmailService;
    }
    public function __invoke(KafkaConsumerMessage $message)
    {
        $body = $message->getBody();
        $handler = $body['handler'];

        switch($body['type']) {
            case 'email': $this->EmailService->$handler($body['data']);
        }
    }
}