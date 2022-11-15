<?php

declare(strict_types=1);

namespace Unit3\HelloWorldViewModel\Controller\Page;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Model implements HttpGetActionInterface
{
    protected PageFactory $_pageFactory;

    public function __construct(
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
    }

    public function execute(): ResultInterface
    {
        $page = $this->_pageFactory->create();
        $block = $page->getLayout()->getBlock("unit3helloworldviewmodel_model");
        $block->setData("custom_set","PARAMETER FROM CONTROLLER");
        return $page;
    }
}

