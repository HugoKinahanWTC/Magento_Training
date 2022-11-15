<?php

declare(strict_types=1);

namespace Unit1\Plugins\Plugin;

use Magento\Theme\Block\Html\Footer;

/**
 * Class AfterFooterPlugin
 * @package Unit1\Plugins\Plugin
 */
class AfterFooterPlugin
{
    /**
     * @param Footer $subject
     * @param $result
     * @return string
     */
    public function afterGetCopyright(Footer $subject, $result): string
    {
        return 'Customized copyright!';
    }
}