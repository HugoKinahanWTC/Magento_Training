<?php

namespace TestModule\TestPlugins\Plugin;

class AfterTestNamePlugin
{

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */

    public function afterGetName(\Magento\Catalog\Model\Product $subject,
                                 $result) {
        return $result . ' - Test.';
    }
}


