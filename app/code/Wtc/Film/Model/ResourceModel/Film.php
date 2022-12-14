<?php

declare(strict_types=1);

namespace Wtc\Film\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Film extends AbstractDb
{
    // this is enough to have a functioning Resource Model
    // phpcs:ignore
    public function _construct(): void
    {
        $this->_init('film_list', 'film_id');
    }
}
