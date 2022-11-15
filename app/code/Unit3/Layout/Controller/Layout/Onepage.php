<?php

declare(strict_types=1);

namespace Unit3\Layout\Controller\Layout;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Onepage implements HttpGetActionInterface
{

    protected PageFactory $_pageFactory;

    public function __construct(
        PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
    }


    public function execute() : ResultInterface
    {
        return $this->_pageFactory->create();
    }
}
