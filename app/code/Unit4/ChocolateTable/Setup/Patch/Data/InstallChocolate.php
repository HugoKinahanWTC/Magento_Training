<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InstallChocolate implements DataPatchInterface
{

    protected ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply() {
        $data = [
            ['name' => 'Mars Bar', 'description' => 'A candy bar with nougat and toasted almonds coated with milk chocolate', 'rating'
            => 6.00, 'price' => 0.95],
            ['name' => 'Milky Way', 'description' => 'The Milky Way bar is made of nougat, topped with caramel and covered with milk chocolate',            'rating' => 5.5, 'price' => 0.85],
            ['name' => 'Toffee Crisp', 'description' => 'The delicious combination of biscuit, crispy cereal and caramel all covered in chocolate makes Toffee Crisp a biscuit your family will love', 'rating' => 9.00, 'price' => 0.90],
            ['name' => 'Galaxy', 'description' => 'It is unmistakably smooth and creamy and has been loved by the nation for generations',                  'rating' => 6.5, 'price' => 1.00],
            ['name' => 'Malteser', 'description' => 'Maltesers consist of a spheroid malted milk centre surrounded by milk chocolate', 'rating'
            => 7.5, 'price' => 0.75],
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
