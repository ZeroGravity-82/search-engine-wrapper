<?php

namespace App\Domain\SearchEngine;

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
