<?php

namespace App\Domain\SearchEngine;

use DOMNodeList;
use DOMElement;

/**
 * Class YandexXmlResponseParser
 */
class YandexXmlResponseParser extends XmlResponseParser implements ResponseParserInterface
{
    /**
     * @var string
     */
    protected $containerName = 'doc';

    /**
     * @var ResultFactoryInterface
     */
    protected $factory;

    /**
     * YandexXmlResponseParser constructor.
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
        foreach($containers as $container) {                            // Get necessary data - title, url and summary
            $title = trim($container->getElementsByTagName('title')->item(0)->nodeValue);
            $url = $container->getElementsByTagName('url')->item(0)->nodeValue;
            $summary = $this->extractSummary($container);
            $results[] = $this->factory->createSearchResult($title, $url, $summary);
        }
        return $results;
    }

    /**
     * @param DOMElement $container
     * @return string
     */
    private function extractSummary(DOMElement $container)
    {
        $summary = '';                              // Summary is represented by a headline or by a set of passages
        $headline = $container->getElementsByTagName('headline');
        if($headline->length > 0) {
            $summary = $headline->item(0)->nodeValue;
        } else {
            $passages = $container->getElementsByTagName('passage');
            $passageNumber = 0;
            foreach($passages as $passage) {
                if($passageNumber > 0) {
                    $summary .= ' … ';              // Passages in summary should be delimited with an ellipsis
                }
                $summary .= trim($passage->nodeValue);
                $passageNumber++;
            }
        }
        return $summary;
    }
}
