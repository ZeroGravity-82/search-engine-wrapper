<?php

namespace App\Domain\SearchEngine;

use DOMNodeList;

/**
 * Class GoogleAtomResponseParser
 */
class GoogleAtomResponseParser extends XmlResponseParser implements ResponseParserInterface
{
    /**
     * @var string
     */
    protected $containerName = 'entry';

    /**
     * @var ResultFactoryInterface
     */
    protected $factory;

    /**
     * GoogleAtomResponseParser constructor.
     * @param ResultFactoryInterface $factory
     */
    public function __construct(ResultFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param DOMNodeList $containers
     * @return array
     */
    protected function extractSearchResults(DOMNodeList $containers)
    {
        $results = array();
        foreach ($containers as $container) {                           // Get necessary data - title, url and summary
            $title = strip_tags($container->getElementsByTagName('title')->item(0)->nodeValue);
            $url = $container->getElementsByTagName('link')->item(0)->getAttribute('href');
            $summary = strip_tags($container->getElementsByTagName('summary')->item(0)->nodeValue);
            $results[] = $this->factory->createSearchResult($title, $url, $summary);
        }
        return $results;
    }
}
