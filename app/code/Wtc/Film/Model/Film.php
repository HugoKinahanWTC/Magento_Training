<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\Model\AbstractModel;
use Wtc\Film\Api\Data\FilmInterface;
use Wtc\Film\Model\ResourceModel\Film as ResourceFilm;

class Film extends AbstractModel implements FilmInterface
{
    // This is enough to have a functional model
    // phpcs:ignore
    public function _construct(): void
    {
        $this->_init(ResourceFilm::class);
    }

    public function getTitle(): string
    {
        return $this->_getData('title');
    }

    public function setTitle($title): string
    {
        $this->setData('title', $title);
    }

    public function getStatus(): int
    {
        return $this->_getData('status');
    }

    public function setStatus($status): void
    {
        $this->setData('status', $status);
    }
}
