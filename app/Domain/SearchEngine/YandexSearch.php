<?php

namespace App\Domain\SearchEngine;

/**
 * Class YandexSearch
 * Uses Yandex.XML API (https://tech.yandex.ru/xml/doc/dg/concepts/about-docpage/).
 */
class YandexSearch extends AbstractSearch
{
    /**
     * @var string
     */
    private $apiUrl = 'https://yandex.ru/search/xml';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $userName;

    /**
     * YandexSearch constructor.
     * @param string                  $apiKey
     * @param string                  $userName
     * @param ResponseParserInterface $parser
     */
    public function __construct($apiKey, $userName, ResponseParserInterface $parser)
    {
        $this->apiKey = $apiKey;
        $this->userName = $userName;
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
            "&user={$this->userName}" .
            "&query=$queryString";
    }
}
