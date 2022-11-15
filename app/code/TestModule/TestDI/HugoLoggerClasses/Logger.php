<?php

namespace TestModule\TestDI\HugoLoggerClasses;

use Psr\Log\LoggerInterface;

class Logger {
    protected $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

}