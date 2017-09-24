<?php

namespace App\Domain\SearchEngine;

use App\Domain\Exceptions\XmlException;
use DOMDocument;
use DOMNodeList;

/**
 * Class XmlResponseParser
 */
abstract class XmlResponseParser implements ResponseParserInterface
{
    /**
     * @var string
     */
    protected $containerName;

    /**
     * @param string $response
     * @return array
     * @throws XmlException In case of XML document loading from a string failure.
     */
    public function process($response)
    {
        $dom = new DOMDocument();                                       // Create an empty DOM object
        if($dom->loadXML($response) === false) {                        // Load the XML into the DOM object
            throw XmlException::loadingFailed();
        }
        $containers = $dom->getElementsByTagName($this->containerName); // Select all containers of search results
        return $this->extractSearchResults($containers);                // Extract results
    }

    /**
     * @param DOMNodeList $containers
     * @return array
     */
    abstract protected function extractSearchResults(DOMNodeList $containers);
}