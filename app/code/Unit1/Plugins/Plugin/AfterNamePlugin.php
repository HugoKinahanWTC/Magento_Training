<?php

namespace Unit1\Plugins\Plugin;

class AfterNamePlugin
{
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject,
                                 $result)
    {
        return $result . '!';
    }
}
