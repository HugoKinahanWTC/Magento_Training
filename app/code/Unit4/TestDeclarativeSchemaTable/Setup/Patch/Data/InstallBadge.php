<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchemaTable\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InstallBadge implements DataPatchInterface
{
    /**
     * @var use Magento\Framework\Setup\ModuleDataSetupInterface
     * $moduleDataSetup
     */
    protected $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply() {
        $data = [
            ['name' => 'Test Badge', 'code' => 'test_badge', 'price' => 12.22],
            ['name' => 'Second Badge', 'code' => 'second_badge', 'price' => 10.15],
            ['name' => 'Another Badge', 'code' => 'another_badge', 'price' => 5.55],
            ['name' => 'Simple Badge', 'code' => 'simple_badge', 'price' => 110.00]
        ];

        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('training_badge'), $data
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }
    public static function getDependencies() {
        return [];
    }

    public function getAliases() {
        return [];
    }
}
