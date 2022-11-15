<?php

namespace Unit1\HugoTestEvent\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Data implements ObserverInterface
{
    /**
     * @param Observer $observer
     *
     * this method will fire when the event runs!
     */
    public function execute(Observer $observer) {
        // TODO: Implement execute() method.
    $product = $observer->getProduct();
    $originalName = $product->getName();
    $modifiedName = $originalName . ' - Hugo Test :)';

    $product->setName($modifiedName);

    }
}
