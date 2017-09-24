<?php

namespace App\Domain\SearchEngine;

use App\Domain\Exceptions\JsonException;
use stdClass;

/**
 * Class DdgJsonResponseParser
 */
class DdgJsonResponseParser implements ResponseParserInterface
{
    /**
     * @var ResultFactoryInterface
     */
    protected $factory;

    /**
     * DdgJsonResponseParser constructor.
     * @param ResultFactoryInterface $factory
     */
    public function __construct(ResultFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $response
     * @return array
     * @throws JsonException In case of JSON response decoding to an instance of StdClass failure.
     */
    public function process($response)
    {
        $json = json_decode($response);                             // Decode JSON response to an instance of stdClass
        if(!($json instanceof stdClass)) {
            throw JsonException::decodeToStdClassFailed();
        }
        $containers = property_exists($json, 'RelatedTopics')
            ? $json->RelatedTopics                                  // Select all containers of search results
            : array();
        return $this->extractSearchResults($containers);            // Extract results
    }

    /**
     * @param array $containers
     * @return array
     */
    private function extractSearchResults(array $containers)
    {
        $results = array();
        foreach($containers as $container) {                        // Get necessary data - title, url and summary
            if(property_exists($container, 'Topics')) {             // Topics may content subtopics
                $results = array_merge($results, $this->extractSearchResults($container->Topics));
                continue;
            }
            $title = $container->Text;
            $url = $container->FirstURL;
            $results[] = $this->factory->createSearchResult($title, $url);
        }
        return $results;
    }
}
