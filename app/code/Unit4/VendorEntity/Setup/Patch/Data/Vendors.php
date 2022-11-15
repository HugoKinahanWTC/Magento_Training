<?php

declare(strict_types=1);

namespace Unit4\VendorEntity\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class Vendors implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * Vendors constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply() {
        $this->moduleDataSetup->startSetup();
        $this->moduleDataSetup->getConnection()->insert('vendor_entity',
            [
                'code' => 'Auchan',
                'contact' => '38011122333',
                'goods_type' => 'food'
            ]
        );
        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies() {
        return [];
    }

    public function getAliases() {
        return [];
    }
}
