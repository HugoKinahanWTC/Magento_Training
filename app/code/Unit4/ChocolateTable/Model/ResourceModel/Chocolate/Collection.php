<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Model\ResourceModel\Chocolate;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Unit4\ChocolateTable\Model\Chocolate::class,
            \Unit4\ChocolateTable\Model\ResourceModel\Chocolate::class);
    }
}
