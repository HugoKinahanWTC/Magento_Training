<?php

declare(strict_types=1);

namespace Unit3\HelloWorldBlock\Controller\Block;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $layout = $this->_pageFactory->create()->getLayout();
        $block = $layout->createBlock('Unit3\HelloWorldBlock\Block\Test');
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());

        return $result;
    }
}

