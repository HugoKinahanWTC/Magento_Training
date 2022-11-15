<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchemaTable\Model\ResourceModel\Badge;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    public function _construct()
    {
        $this->_init(\Unit4\TestDeclarativeSchemaTable\Model\Badge::class,
            \Unit4\TestDeclarativeSchemaTable\Model\ResourceModel\Badge::class);
    }
}
