<?php

namespace Unit5\Repository\Api;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ExampleRepositoryInterface
{
    /**
     * @return Data\ExampleSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
