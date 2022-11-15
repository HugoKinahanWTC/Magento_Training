<?php

declare(strict_types = 1);

namespace Unit2\HelloWorldRaw\Controller\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\RawFactory;

class Index implements HttpGetActionInterface
{

    /**
     * @var RawFactory
     */
    protected RawFactory $rawFactory;

    public function __construct(
        RawFactory $rawFactory
    ) {
        $this->rawFactory = $rawFactory;
    }

    public function execute() : ResultInterface
    {
        $result = $this->rawFactory->create();
        $result->setContents('Hello Hugo');
        $result->setHeader('Content-Type', 'text/plain');
        return $result;
    }
}