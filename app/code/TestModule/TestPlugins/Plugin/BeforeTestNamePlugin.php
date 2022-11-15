<?php

namespace TestModule\TestPlugins\Plugin;

class BeforeTestNamePlugin
{
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $name
     * @return string[]
     */
    public function beforeSetName(\Magento\Catalog\Model\Product
                                         $subject, $name) {

        return ['(' . 'Test - ' . $name . ')'];
    }
}