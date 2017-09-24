<?php

namespace App\Domain\SearchEngine;

/**
 * Interface ResponseParserInterface
 */
interface ResponseParserInterface
{
    /**
     * @param string $response
     * @return array
     */
    public function process($response);
}
