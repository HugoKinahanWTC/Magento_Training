<?php

namespace Wtc\Film\Plugin;

class PricePlugin
{

    /**
     * @param Magento\Catalog\Model\Product $subject
     * @param $result
     * @return float
     */

    public function afterGetPrice (\Magento\Catalog\Model\Product $subject,
                                                                  $result) {
        return $result + 0.01;
    }
}
