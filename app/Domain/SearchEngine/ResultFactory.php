<?php

namespace App\Domain\SearchEngine;

/**
 * Class ResultFactory
 */
class ResultFactory implements ResultFactoryInterface
{
    /**
     * @param string      $title
     * @param string      $url
     * @param string|null $summary
     * @return Result
     */
    public function createSearchResult($title, $url, $summary = null)
    {
        return new Result($title, $url, $summary);
    }
}
