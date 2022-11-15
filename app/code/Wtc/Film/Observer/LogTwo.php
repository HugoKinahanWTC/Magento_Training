<?php

declare(strict_types=1);

namespace Wtc\Film\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Wtc\Film\Api\FilmRepositoryInterface;
use Wtc\Film\Controller\Repository\Film;

class LogTwo implements ObserverInterface
{
    private Film $films;

    private LoggerInterface $logger;

    private FilmRepositoryInterface $film;

    public function __construct(
        Film $films,
        LoggerInterface $logger,
        FilmRepositoryInterface $film
    ) {
        $this->logger = $logger;
        $this->films = $films;
        $this->film = $film;
    }

    public function execute(Observer $observer): void
    {
        /** @var \Magento\Customer\Model\Data\Customer $customer */
        $customer = $observer->getData('customer');
        $customer = $customer->getCustomAttributes();

        $film = $this->film->getById($customer['favourite_film']->getValue());

        $this->logger->critical(
            $film['title'] . ' - Observer Two'
        );
    }
}
