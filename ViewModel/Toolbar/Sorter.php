<?php

declare(strict_types=1);

namespace Hypermage\BlockCatalogProductListToolbar\ViewModel\Toolbar;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

readonly class Sorter implements ArgumentInterface
{
    public function __construct(
        protected UrlInterface $url
    )
    {
    }

    public function getCurrentUrl(): string
    {
        return $this->url->getCurrentUrl();
    }

    public function getSortUrl(string $field): string
    {
        $currentUrl = $this->url->getCurrentUrl();

        $parsedUrl = parse_url($currentUrl);
        parse_str($parsedUrl['query'] ?? '', $queryParams);

        $queryParams['product_list_order'] = $field;

        $newQuery = http_build_query($queryParams);
        $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . '?' . $newQuery;

        return $newUrl;
    }

    public function getDirectionUrl(string $field): string
    {
        $currentUrl = $this->url->getCurrentUrl();

        $parsedUrl = parse_url($currentUrl);
        parse_str($parsedUrl['query'] ?? '', $queryParams);

        $queryParams['product_list_dir'] = $field;

        $newQuery = http_build_query($queryParams);
        $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . '?' . $newQuery;

        return $newUrl;
    }
}
