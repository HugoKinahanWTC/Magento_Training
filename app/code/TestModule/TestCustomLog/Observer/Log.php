<?php

declare(strict_types=1);

namespace TestModule\TestCustomLog\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;

class Log implements \Magento\Framework\Event\ObserverInterface
{
    private $logger;


    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->critical(
            "Log working :)"
        );
    }
}