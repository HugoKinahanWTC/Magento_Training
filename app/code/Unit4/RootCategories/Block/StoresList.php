<?php

declare(strict_types=1);

namespace Unit4\RootCategories\Block;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;


class StoresList extends Template
{

    protected $catalogCategory;

    public function __construct(CategoryInterface $catalogCategory, Context $context)
    {
        $this->catalogCategory = $catalogCategory;
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function _toHtml()
    {
        $storesList = $this->_storeManager->getStores();
        $catalogCategory = $this->catalogCategory;

        $stores = [];
        foreach ($storesList as $store) {
            $categoryName = $catalogCategory->load($store->getRootCategoryId())->getName();
            $stores[] = [
                'store_name' => $store->getName(),
                'root_category_name' => $categoryName
            ];
        }

        $stores = array_map(function($item)
        {
            $string = '<b>STORE</b> ' . $item['store_name'];
            $string .= ' <b>ROOT CATEGORY</b> ' . $item['root_category_name'] . '<br>';

            return $string;
        }, $stores);

        $response = implode('', $stores);
        return $response;
    }
}

