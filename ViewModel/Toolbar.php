<?php

declare(strict_types=1);

namespace Hypermage\BlockCatalogProductListToolbar\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

readonly class Toolbar implements ArgumentInterface
{
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    )
    {
    }

    public function getUseBoost(): bool
    {
        $useBoost = $this->scopeConfig->getValue('hypermage_catalog_product_list/toolbar/use_boost', ScopeInterface::SCOPE_WEBSITE);

        return $useBoost === '1';
    }
}
