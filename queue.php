<?php
use Illuminate\Queue\Capsule\Manager as Queue;
use Illuminate\Queue\Connectors\RedisConnector;
use Illuminate\Redis\RedisManager;

$queue = new Queue();
$app = $queue->getContainer();
$manager = $queue->getQueueManager();

$queue->addConnection(
    [
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'crontab',
        'retry_after' => 90,
        'block_for' => 5,
    ],
    'default'
);

$manager->addConnector(
    'redis',
    function () use ($app) {
        $options = [
            'cluster' => false,
            'default' => [
                'host' => '127.0.0.1',
                'port' => 63792,
                'database' => 0,
            ],
        ];
        $redisManager = new RedisManager($app, 'predis', $options);
        return new RedisConnector($redisManager);
    }
);

// Make this Capsule instance available globally via static methods... (optional)
$queue->setAsGlobal();
return $queue;