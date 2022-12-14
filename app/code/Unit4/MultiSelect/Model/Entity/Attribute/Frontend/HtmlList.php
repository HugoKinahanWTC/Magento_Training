<?php

declare(strict_types=1);

namespace Unit4\MultiSelect\Model\Entity\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;
use Magento\Framework\DataObject;

class HtmlList extends AbstractFrontend
{

    /**
     * @param DataObject $object
     * @return mixed|string
     */
    public function getValue(DataObject $object): mixed {
        if ($this->getConfigField('input') != 'multiselect') {
            return parent::getValue($object);
        }
        return $this->getValuesAsHtmlList($object);
    }

    /**
     * @param DataObject $object
     * @return string
     */
    private function getValuesAsHtmlList(DataObject $object): string {
        $options = $this->getOptions($object);
        $escapedOptions = array_map('htmlspecialchars', $options);
        return sprintf(
            '<ul><li>%s</li></ul>',
            implode('</li><li>', $escapedOptions)
        );
    }

    /**
     * @param DataObject $object
     * @return array|bool|mixed
     */
    private function getOptions(DataObject $object): mixed {
        $optionId = $object->getData($this->getAttribute()->getAttributeCode());
        $option = $this->getOption($optionId);
        return $this->isSingleValue($option) ? [$option] : $option;
    }

    /**
     * @param $option
     * @return bool
     */
    private function isSingleValue($option): bool {
        return !is_array($option);
    }
}
