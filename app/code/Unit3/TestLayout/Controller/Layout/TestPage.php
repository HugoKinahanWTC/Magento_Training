<?php

declare(strict_types=1);

namespace Unit3\TestLayout\Controller\Layout;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;

class TestPage implements HttpGetActionInterface
{
    protected PageFactory $pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    public function execute(): ResultInterface {
        return $this->pageFactory->create();
    }
}