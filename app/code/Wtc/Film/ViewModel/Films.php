<?php

declare(strict_types=1);

namespace Wtc\Film\ViewModel;

use Magento\Customer\Model\Context as ModelContext;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Wtc\Film\Controller\Repository\Film;


class Films extends Template implements ArgumentInterface
{
    protected Film $films;

    protected Session $session;

    protected HttpContext $httpContext;

    public function __construct(
        Film $films,
        Session $session,
        Context $context,
        HttpContext $httpContext
    ) {
        $this->films = $films;
        $this->session = $session;
        $this->httpContext = $httpContext;
        parent::__construct($context);
    }

    public function getCustomerFavouriteFilm(): ?string
    {
        $customer = $this->getCustomerId();
        if (!$customer) {
            return 'null';
        }
        $customerFavouriteFilm = $this->httpContext->getValue('favourite_film');
        return $customerFavouriteFilm;
    }

    public function getAllActiveFilms(): array
    {
        return $this->films->getFilmsFromRepository();
    }

    public function getCustomerId()
    {
        return $this->httpContext->getValue('customer_id');
    }
    public function getCustomerIsLoggedIn(): bool
    {
        return (bool) $this->httpContext->getValue(ModelContext::CONTEXT_AUTH);
    }

    public function getCustomerName(): string
    {
        return $this->httpContext->getValue('customer_name');
    }

    public function getCustomerEmail(): string
    {
        return $this->httpContext->getValue('customer_email');
    }
}
