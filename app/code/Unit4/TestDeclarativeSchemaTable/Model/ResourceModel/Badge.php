<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchematable\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Badge extends AbstractDb
{
    // this is enough to have a functioning Resource Model
    public function _construct() {
        $this->_init('training_badge', 'badge_id');
    }
}
