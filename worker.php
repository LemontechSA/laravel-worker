<?php
require_once 'vendor/autoload.php';

use Illuminate\Queue\Worker;
use Illuminate\Queue\WorkerOptions;
use Standalone\Utils\Event;
use Standalone\Utils\Handler;

$queue = include_once './queue.php';

$options = new WorkerOptions('default');
$event = new Event;
$handler = new Handler;

$isDownForMaintenance = function () {
    return false;
};


$connection = $queue->getConnection('default');
$manager = $queue->getQueueManager();
$worker = new Worker($manager, $event, $handler, $isDownForMaintenance);
$worker->daemon('default', 'crontab', $options);