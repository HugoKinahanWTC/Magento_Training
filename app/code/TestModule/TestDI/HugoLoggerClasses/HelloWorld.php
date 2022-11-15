<?php

namespace TestModule\TestDI\HugoLoggerClasses;

use TestModule\TestDI\HugoInterface\HelloWorld as HelloWorldInterface;

class HelloWorld implements HelloWorldInterface
{
    public function helloWorld() {
        // TODO: Implement helloWorld() method.
        die('Hello World');
    }

}

