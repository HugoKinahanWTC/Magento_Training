<?php

declare(strict_types=1);

namespace Unit3\HugoHelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Test extends Template
{

    public function sayHello()
    {
        return __('Hello World');
    }
}

