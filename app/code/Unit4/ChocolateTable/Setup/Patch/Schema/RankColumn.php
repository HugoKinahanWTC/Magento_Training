<?php

declare(strict_types=1);

namespace Unit4\ChocolateTable\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class RankColumn implements SchemaPatchInterface
{
    protected SchemaSetupInterface $moduleSchemaSetup;

    public function __construct(SchemaSetupInterface $moduleSchemaSetup) {
        $this->moduleSchemaSetup = $moduleSchemaSetup;
    }

    public function apply() {
        $this->moduleSchemaSetup->startSetup();
        $this->moduleSchemaSetup->getConnection()->addColumn('chocolate_table',
            'ranking',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'unsigned' => true,
                'nullable' => false,
                'comment' => 'Ranking'
            ]
        );
        $this->moduleSchemaSetup->endSetup();
    }

    public static function getDependencies(): array {
        return [];
    }

    public function getAliases(): array {
        return [];
    }
}

