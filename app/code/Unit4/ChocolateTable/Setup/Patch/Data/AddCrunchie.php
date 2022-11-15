<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCrunchie implements DataPatchInterface
{

    protected ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply() {
        $data = [
            ['name' => 'Crunchie', 'description' => 'A chunky, gold bar of delicious honeycomb, smothered in thick Cadbury milk chocolate that shatters into mouth-watering crunchy pieces', 'rating'
            => 7.50, 'price' => 0.55]
        ];

        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('chocolate_table'), $data
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies(): array {
        return [];
    }

    public function getAliases(): array {
        return [];
    }
}

