<?php

namespace Unit5\Repository\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ExampleSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Unit5\Repository\Api\Data\ExampleInterface[]
     * @api
     */
    public function getItems();

    /**
     * @param \Unit5\Repository\Api\Data\ExampleInterface[] $items
     * @return $this
     * @api
     */
    public function setItems(array $items = null);
}
