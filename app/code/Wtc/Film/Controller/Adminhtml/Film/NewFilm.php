<?php

declare(strict_types=1);

namespace Wtc\Film\Controller\Adminhtml\Film;

use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class NewFilm implements HttpGetActionInterface
{
    protected ForwardFactory $resultForwardFactory;

    public function __construct(
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
    }

    public function execute(): Forward
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        // phpcs:ignore
        //        die('stopping infinite loop');
        //        $resultForward->getConfig()->getTitle()->prepend((__('Add Film')));
        return $resultForward->forward('edit');
    }
}
