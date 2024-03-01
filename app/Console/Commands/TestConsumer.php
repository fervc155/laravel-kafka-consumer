<?php

namespace App\Console\Commands;

use App\Handlers\TestHandler;
use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;

class TestConsumer extends Command
{
    protected $signature = 'kafka:test';

    protected $description = 'Command description';

    public function handle(): void
    {
        $consumer = Kafka::createConsumer()
            ->subscribe('test')
            ->withHandler(new TestHandler)
            ->withAutoCommit()
        //    ->withConsumerGroupId('group')
            ->build();

        error_log('build');
        $consumer->consume();

        error_log('close');
    }
}