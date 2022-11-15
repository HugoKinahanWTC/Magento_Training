<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Model;

use Magento\Framework\Model\AbstractModel;

class Chocolate extends AbstractModel
{
    // This is enough to have a functional model
    public function _construct()
    {
        $this->_init(\Unit4\ChocolateTable\Model\ResourceModel\Chocolate::class);
    }
}

