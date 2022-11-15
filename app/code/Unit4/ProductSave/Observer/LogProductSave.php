<?php

declare(strict_types=1);

namespace Unit4\ProductSave\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;


class LogProductSave implements ObserverInterface
{
    protected $_logger = null;

    public function __construct(LoggerInterface $logger) {
        $this->_logger = $logger;
    }

    public function execute(Observer $observer) {
        $product = $observer->getEvent()->getProduct();

        if ($product->getId() && ($product->isDataChanged() || $product->isObjectNew())) {
            $logMessage = PHP_EOL . 'Product Saving Log...' . PHP_EOL;
            foreach ($product->getData() as $key => $dataItem) {
                if ((is_string($dataItem) || is_int($dataItem)) && $dataItem != $product->getOrigData($key)) {
                    $logMessage .= $key . ' = ' . $dataItem . PHP_EOL;
                }
            }
            $this->_logger->info($logMessage);
        }
    }
}
