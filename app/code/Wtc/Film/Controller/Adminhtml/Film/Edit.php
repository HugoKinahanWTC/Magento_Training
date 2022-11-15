<?php

declare(strict_types=1);

namespace Wtc\Film\Controller\Adminhtml\Film;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Wtc\Film\Model\Film;

class Edit extends Action implements HttpGetActionInterface
{
    protected PageFactory $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    // phpcs:ignore
    protected function _initAction(): Page
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Wtc_Film::films')
            ->addBreadcrumb(__('Manage Films'), __('Manage Films'));
        return $resultPage;
    }

    public function execute(): Page
    {
        $id = $this->getRequest()->getParam('film_id');
        $model = $this->_objectManager->create(Film::class);
        // phpcs:ignore
//        $viewModel = $this->getViewModel();
        if ($id) {
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/index');
            }
        }

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Film') : __('New Film'),
            $id ? __('Edit Film') : __('New Film')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Films'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Film'));

        return $resultPage;
    }
}
