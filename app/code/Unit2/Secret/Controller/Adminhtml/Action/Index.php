<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unit2\Secret\Controller\Adminhtml\Action;
/**
 * Class Index
 * @package Unit2\Secret\Controller\Adminhtml\Action
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * execute method
     */
    public function execute() {
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents('Hello Secret');
        return $result;
    }

    /**
     * @return int
     */
    protected function _isAllowed() {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret == 1;
    }

    /**
     * @return true
     */
    public function _processUrlKeys() {
        return true;
    }
}