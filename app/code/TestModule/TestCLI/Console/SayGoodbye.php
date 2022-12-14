<?php
namespace TestModule\TestCLI\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayGoodbye extends Command
{
    protected function configure()
    {
        $this->setName('hugo:saygoodbye');
        $this->setDescription('Demo command line.');

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Goodbye :)");
    }
}