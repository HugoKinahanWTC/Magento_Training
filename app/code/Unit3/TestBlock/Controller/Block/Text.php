<?php

declare(strict_types=1);

namespace Unit3\TestBlock\Controller\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Text extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;


    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute() {
        $block = $this->_pageFactory->create()->getLayout()->createBlock('Magento\Framework\View\Element\Text');
        $block->setText("Hello World From a New Module!");
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());

        return $result;
    }
}
