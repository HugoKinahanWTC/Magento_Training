<?php

declare(strict_types=1);

namespace Unit4\TestDeclarativeSchemaTable\Controller\Badge;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    protected PageFactory $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        $page = $this->pageFactory->create();
        return $page;
    }

}
