<?php

declare(strict_types = 1);

namespace Unit2\HelloWorldController\Controller\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected PageFactory $_pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }


    public function execute() : ResultInterface
    {
        $result = $this->_pageFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);;
        die('page test');
        return $result;
    }
}
