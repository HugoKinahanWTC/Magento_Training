<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Chocolate extends AbstractDb
{
    // this is enough to have a functioning Resource Model
    public function _construct()
    {
        $this->_init('chocolate_table', 'chocolate_id');
    }
}

