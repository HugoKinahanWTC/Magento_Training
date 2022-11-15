<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchemaTable\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Unit4\TestDeclarativeSchemaTable\Model\BadgeFactory;
use Unit4\TestDeclarativeSchemaTable\Model\ResourceModel\Badge\CollectionFactory;

class Badges implements ArgumentInterface
{

    protected BadgeFactory $badgeFactory;

    protected CollectionFactory $collectionFactory;


    public function __construct(BadgeFactory $badgeFactory,
                                CollectionFactory $collectionFactory) {
        $this->badgeFactory = $badgeFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllBadges() {
        return $this->collectionFactory->create();
    }

    public function getBadge($id) {
        $badge = $this->badgeFactory->create();
        $badge->load($id);

        return $badge;
    }
}