<?php

declare(strict_types=1);

namespace Unit1\TestPlugins\Plugin;

use Magento\Theme\Block\Html\Footer;

/**
 * Class AfterTestFooterPlugin
 * @package Unit1\TestPlugins\Plugin
 */
class AfterTestFooterPlugin
{
    /**
     * @param Footer $subject
     * @param $result
     * @return string
     */
    public function afterGetCopyright(Footer $subject, $result): string
    {
        return 'Hugo Test';
    }
}
