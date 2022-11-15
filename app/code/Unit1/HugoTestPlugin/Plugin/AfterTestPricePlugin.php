<?php

namespace Unit1\HugoTestPlugin\Plugin;

class AfterTestPricePlugin
{

    /**
     * @param Magento\Catalog\Model\Product $subject
     * @param $result
     * @return float
     */

    public function afterGetPrice (\Magento\Catalog\Model\Product $subject,
                                   $result) {
        return $result + 0.33;
    }
}

