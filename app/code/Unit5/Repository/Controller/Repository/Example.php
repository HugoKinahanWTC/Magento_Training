<?php

namespace Unit5\Repository\Controller\Repository;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Unit5\Repository\Api\ExampleRepositoryInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Example implements HttpGetActionInterface
{
    /**
     * @var ExampleRepositoryInterface
     */
    private $exampleRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var FilterBuilder
     */
    private $filterBuilder;
    /**
     * @var RawFactory
     */
    private RawFactory $rawFactory;

    /**
     * Example constructor.
     * @param ExampleRepositoryInterface $exampleRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     */
    public function __construct(
        ExampleRepositoryInterface $exampleRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        RawFactory                  $rawFactory
    ) {
        $this->exampleRepository = $exampleRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->rawFactory = $rawFactory;
    }
    public function execute()
    {
        $response = $this->rawFactory->create();
        $filters[] = array_map(function ($name) {
            return $this->filterBuilder
                ->setConditionType('eq')
                ->setField('name')
                ->setValue($name)
                ->create();
        }, ['Foo', 'Bar', 'Baz', 'Qux']);
        $this->searchCriteriaBuilder->addFilters($filters);
        $examples = $this->exampleRepository->getList(
            $this->searchCriteriaBuilder->create()
        )->getItems();
        $exampleArray = [];
        foreach ($examples as $example) {
            $exampleArray[] = sprintf(
                "%s (%d)\n",
                $example->getName(),
                $example->getId()
            );
        }
        return $response->setContents(implode('<br>', $exampleArray));
    }
}
