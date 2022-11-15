<?php

namespace TestModule\TestCrons\Cron;

use Psr\Log\LoggerInterface;

class TestCron {
    protected $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * Write to system.log
     *
     * @return void
     */
    public function execute() {
        $this->logger->info('Hugo, Cron Works');
    }
}