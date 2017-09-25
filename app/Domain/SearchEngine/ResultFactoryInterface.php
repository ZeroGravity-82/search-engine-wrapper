<?php

namespace App\Domain\SearchEngine;

/**
 * Interface ResultFactoryInterface
 */
interface ResultFactoryInterface
{
    /**
     * @param string      $title
     * @param string      $url
     * @param string|null $summary
     * @return mixed
     */
    public function createSearchResult($title, $url, $summary = null);
}
