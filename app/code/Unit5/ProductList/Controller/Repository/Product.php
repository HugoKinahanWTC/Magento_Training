<?php

declare(strict_types=1);

namespace Unit5\ProductList\Controller\Repository;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable as ConfigurableProduct;
use Magento\Framework\Controller\ResultInterface;


class Product implements HttpGetActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var RawFactory
     */
    private RawFactory $rawFactory;

    /**
     * @var FilterBuilder
     */

    private FilterBuilder $filterBuilder;

    /**
     * @var SortOrderBuilder
     */

    private SortOrderBuilder $sortOrderBuilder;

    public function __construct(
        RawFactory                 $rawFactory,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder      $searchCriteriaBuilder,
        FilterBuilder              $filterBuilder,
        SortOrderBuilder           $sortOrderBuilder
    ) {
        $this->rawFactory = $rawFactory;
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function execute() : ResultInterface
    {
        $response = $this->rawFactory->create();
        //        $response->setHeader('Content-Type', 'text/plain');
        $products = $this->getProductsFromRepository();
        $productArray = [];
        foreach ($products as $product) {
            $productArray[] = sprintf(
                "%s - %s (%d)\n",
                $product->getName(),
                $product->getSku(),
                $product->getId());
        }
        return $response->setContents(implode('<br>', $productArray));
    }

    /**
     * @return ProductInterface[]
     */
    private function getProductsFromRepository(): array
    {
        $this->setProductTypeFilter();
        $this->setProductNameFilter();
        $this->setProductOrder();
        $this->setProductPaging();

        $criteria = $this->searchCriteriaBuilder->create();
        $products = $this->productRepository->getList($criteria);
        return $products->getItems();
    }

    private function setProductTypeFilter()
    {
        $configProductFilter = $this->filterBuilder
            ->setField('type_id')
            ->setValue(ConfigurableProduct::TYPE_CODE)
            ->setConditionType('eq')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$configProductFilter]);
    }

    private function setProductNameFilter()
    {
        $nameFilter[] = $this->filterBuilder
            ->setField('name')
            ->setValue('M%')
            ->setConditionType('like')
            ->create();
        $this->searchCriteriaBuilder->addFilters($nameFilter);
    }

    /**
     * setProductOrder
     */
    private function setProductOrder()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('entity_id')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
    }

    /**
     * setProductPaging
     */
    private function setProductPaging()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('entity_id')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
        $this->searchCriteriaBuilder->setPageSize(6);
        $this->searchCriteriaBuilder->setCurrentPage(1);
    }
}
