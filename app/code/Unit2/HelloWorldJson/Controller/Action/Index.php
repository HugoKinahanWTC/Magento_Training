<?php

declare(strict_types = 1);

namespace Unit2\HelloWorldJson\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;

class Index implements HttpGetActionInterface
{

    /**
     * @var JsonFactory
     */
    protected JsonFactory $_resultJsonFactory;

    public function __construct(
        JsonFactory $resultJsonFactory
    ) {
        $this->_resultJsonFactory = $resultJsonFactory;
    }

    public function execute() : ResultInterface {
        $data = ['firstname' => 'Hugo', 'lastname' => 'Kinahan'];
        $result = $this->_resultJsonFactory->create();
        $result->setData($data);
        return $result;
    }
}

