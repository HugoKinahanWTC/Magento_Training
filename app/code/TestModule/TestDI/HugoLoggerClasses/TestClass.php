<?php

namespace TestModule\TestDI\HugoLoggerClasses;

use TestModule\TestDI\HugoLoggerClasses\Logger;
use TestModule\TestDI\HugoInterface\HelloWorld;

class TestClass
{
    private $helloWorld;
    private $logger;

    public function __construct(HelloWorld $helloWorld, Logger $logger) {
        $this->helloWorld = $helloWorld;
        $this->logger = $logger;
    }



    /**
     * Write to system.log
     *
     * @return void
     */
    public function execute() {
        $this->logger->info($this->helloWorld->helloWorld());
    }
}