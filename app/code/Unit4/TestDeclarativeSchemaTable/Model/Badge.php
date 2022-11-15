<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchemaTable\Model;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Intl\DateTimeFactory;
use Magento\Framework\Model\AbstractModel;


class Badge extends AbstractModel
{
    // This is enough to have a functional model
    public function _construct()
    {
        $this->_init(\Unit4\TestDeclarativeSchemaTable\Model\ResourceModel\Badge::class);
    }
}

