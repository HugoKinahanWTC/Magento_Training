<?php

declare(strict_types=1);

namespace Unit4\MultiSelect\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as CatalogAttribute;

class CategoryAttrUpdate implements DataPatchInterface
{
    /**
     * @var CategorySetupFactory
     */
    protected CategorySetupFactory $categorySetupFactory;
    /**
     * @var ModuleDataSetupInterface
     */
    protected ModuleDataSetupInterface $moduleDataSetup;

    /**
     * CategoryAttrUpdate constructor.
     * @param CategorySetupFactory $categorySetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
         CategorySetupFactory $categorySetupFactory,
         ModuleDataSetupInterface $moduleDataSetup
         ) {
         $this->categorySetupFactory = $categorySetupFactory;
         $this->moduleDataSetup = $moduleDataSetup;
     }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $catalogSetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);
        $attrParams = [
            'frontend' => 'Unit4\MultiSelect\Model\Entity\Attribute\Frontend\HtmlList',
            'is_html_allowed_on_front' => 1
        ];
        $catalogSetup->updateAttribute(Product::ENTITY, 'custom_multiselect', $attrParams);
        $this->moduleDataSetup->endSetup();
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies(): array {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases(): array {
        return [];
    }
}

