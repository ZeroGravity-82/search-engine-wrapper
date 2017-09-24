<?php

namespace App\Domain\SearchEngine;

/**
 * Class DdgSearch
 * Uses DuckDuckGo Instant Answer API (https://duckduckgo.com/api).
 * Output format is set to JSON.
 *
 * Notes.
 * As this is an instant answer API, most deep queries (non topic names) will be blank.
 */
class DdgSearch extends AbstractSearch
{
    /**
     * @var string
     */
    private $apiUrl = 'https://api.duckduckgo.com';

    /**
     * DdgSearch constructor.
     * @param ResponseParserInterface $parser
     */
    public function __construct(ResponseParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $queryString
     * @return string
     */
    protected function getRequestUrl($queryString)
    {
        return $this->apiUrl .
            "?q=$queryString" .
            "&format=json" .
            "&no_html=1";
    }
}
