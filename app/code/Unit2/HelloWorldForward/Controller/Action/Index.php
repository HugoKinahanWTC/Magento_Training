<?php

namespace Unit2\HelloWorldForward\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index implements HttpGetActionInterface
{

    /**
     * @var ForwardFactory
     */
    private $forwardFactory;

    /**
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        ForwardFactory $forwardFactory
    ) {
        $this->forwardFactory = $forwardFactory;
    }

    public function execute()
    {
        $forward = $this->forwardFactory->create();
        die('hi hugo');
        return $forward->forward('defaultNoRoute');
    }
}

