<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Unit4\ChocolateTable\Model\ChocolateFactory;
use Unit4\ChocolateTable\Model\ResourceModel\Chocolate\CollectionFactory;

class Chocolates implements ArgumentInterface
{
    protected ChocolateFactory $chocolateFactory;

    protected CollectionFactory $collectionFactory;

    public function __construct(
        ChocolateFactory $chocolateFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->chocolateFactory = $chocolateFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllChocolates() {
        return $this->collectionFactory->create();
    }

    public function getChocolate($id) {
        $chocolate = $this->chocolateFactory->create();
        $chocolate->load($id);

        return $chocolate;
    }

}

