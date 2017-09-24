<?php

namespace App\Domain\SearchEngine;

/**
 * Class GoogleSearch
 * Uses JSON/Atom API of Google Custom Search Engine (https://developers.google.com/custom-search/json-api/v1/overview).
 * Output format is set to Atom (https://www.ietf.org/rfc/rfc4287).
 */
class GoogleSearch extends AbstractSearch
{
    /**
     * @var string
     */
    private $apiUrl = 'https://www.googleapis.com/customsearch/v1';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $searchEngineId;

    /**
     * GoogleSearch constructor.
     * @param string                  $apiKey
     * @param string                  $searchEngineId
     * @param ResponseParserInterface $parser
     */
    public function __construct($apiKey, $searchEngineId, ResponseParserInterface $parser)
    {
        $this->apiKey = $apiKey;
        $this->searchEngineId = $searchEngineId;
        $this->parser = $parser;
    }

    /**
     * @param string $queryString
     * @return string
     */
    protected function getRequestUrl($queryString)
    {
        return $this->apiUrl .
            "?key={$this->apiKey}" .
            "&cx={$this->searchEngineId}" .
            "&alt=atom" .
            "&q=$queryString";
    }
}
