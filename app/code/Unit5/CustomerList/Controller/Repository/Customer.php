<?php

declare(strict_types=1);

namespace Unit5\CustomerList\Controller\Repository;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Customer implements HttpGetActionInterface
{

    /**
     * @var CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $customerRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var RawFactory
     */
    private RawFactory $rawFactory;

    /**
     * @var FilterGroupBuilder
     */
    private FilterGroupBuilder $filterGroupBuilder;
    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder       $searchCriteriaBuilder,
        RawFactory                  $rawFactory,
        FilterGroupBuilder          $filterGroupBuilder,
        FilterBuilder               $filterBuilder
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->rawFactory = $rawFactory;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    public function execute() {
        $response = $this->rawFactory->create();
        $this->addEmailFilter();
        $this->addNameFilter();
        $customers = $this->getCustomersFromRepository();
        $customerArray = [];
//        $this->getResponse()->appendBody(
//            sprintf("List contains %s\n\n", get_class($customers[0])));
        foreach ($customers as $customer) {
            $customerArray[] = sprintf("List contains %s\n\n", get_class
            ($customer));
            $customerArray[] = (sprintf(
                "\"%s %s\" <%s> (%s)\n",
                $customer->getFirstname(),
                $customer->getLastname(),
                $customer->getEmail(),
                $customer->getId()
            ));
        }
        return $response->setContents(implode('<br>', $customerArray));
    }

    /**
     * @return \Magento\Customer\Api\Data\CustomerInterface[]
     */
    private function getCustomersFromRepository() {
        $this->searchCriteriaBuilder->setFilterGroups(
            [$this->filterGroupBuilder->create()]
        );
        $criteria = $this->searchCriteriaBuilder->create();
        $customers = $this->customerRepository->getList($criteria);
        return $customers->getItems();
    }

    private function addEmailFilter() {
        $emailFilter = $this->filterBuilder
            ->setField('email')
            ->setValue('%@example.com')
            ->setConditionType('like')
            ->create();
        $this->filterGroupBuilder->addFilter($emailFilter);
    }

    private function addNameFilter() {
        $nameFilter = $this->filterBuilder
            ->setField('firstname')
            ->setValue('Veronica')
            ->setConditionType('eq')
            ->create();
        $this->filterGroupBuilder->addFilter($nameFilter);
    }
}
