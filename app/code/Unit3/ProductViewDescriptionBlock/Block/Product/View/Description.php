<?php

namespace Unit3\ProductViewDescriptionBlock\Block\Product\View;

class Description extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public
    function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description) {
        $description->setTemplate('Unit3_ProductViewDescriptionBlock::description.phtml');
    }
}
