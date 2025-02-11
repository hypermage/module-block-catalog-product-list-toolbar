<?php

declare(strict_types=1);

namespace Hypermage\BlockCatalogProductListToolbar\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

readonly class Toolbar implements ArgumentInterface
{
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    )
    {
    }

    public function getUseBoost(): bool
    {
        return $this->scopeConfig->getValue('catalog_product_list/toolbar/use_boost') === '1';
    }
}
