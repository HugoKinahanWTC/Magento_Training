<?php

declare(strict_types=1);

namespace Unit3\HugoHelloWorld\Controller\Block;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    protected PageFactory $_pageFactory;

    public function __construct(
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
    }

    public function execute(): ResultInterface
    {
        return $this->_pageFactory->create();
    }
}

