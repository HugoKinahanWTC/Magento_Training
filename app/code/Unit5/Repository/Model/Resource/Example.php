<?php

namespace Unit5\Repository\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Example extends AbstractDb
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('training_repository_example', 'example_id');
    }
}
