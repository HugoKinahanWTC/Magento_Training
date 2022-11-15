<?php

namespace Unit3\HelloWorldViewModel\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class HelloWorldViewModel implements ArgumentInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return ['Shirts', 'Shorts', 'Shoes'];
    }

    /**
     * @param $sku
     */
    public function getProductNameBySku($sku)
    {
        return $this->productRepositoryInterface->get($sku)->getName();
    }
}