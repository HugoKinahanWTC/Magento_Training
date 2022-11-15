<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\HelloWorldRedirect\Controller\Adminhtml\Action;

/**
 * Class HelloWorld
 * @package Unit2\HelloWorldRedirect\Controller\Adminhtml\Action
 */
class HelloWorld extends \Magento\Backend\App\Action
{
    /**
     * execute method
     */
    public function execute()
    {
        return $this->_redirect('catalog/category/view/id/2');
    }

    /**
     * Link must be generated by server side
     * It's only for education purpose!
     *
     * @return bool
     */
    public function _processUrlKeys()
    {
        return true;
    }
}
