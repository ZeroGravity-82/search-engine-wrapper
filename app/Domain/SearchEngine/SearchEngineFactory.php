<?php

namespace App\Domain\SearchEngine;

use App\Domain\Exceptions\SearchEngineException;

/**
 * Class SearchEngineFactory
 * Creates an instance of search engine depending on user selection.
 */
class SearchEngineFactory
{
    /**
     * @param string $name
     * @param array  $config
     * @return AbstractSearch
     * @throws SearchEngineException
     */
    public static function create($name, $config)
    {
        $resultFactory = new ResultFactory();
        switch($name) {
            case 'yandex':
                $apiKey = $config['engines']['yandex']['key'];
                $userName = $config['engines']['yandex']['user'];
                $parser = new YandexXmlResponseParser($resultFactory);
                return new YandexSearch($apiKey, $userName, $parser);
            case 'ddg':
                $parser = new DdgJsonResponseParser($resultFactory);
                return new DdgSearch($parser);
            case 'google':
                $apiKey = $config['engines']['google']['key'];
                $searchEngineId = $config['engines']['google']['cx'];
                $parser = new GoogleAtomResponseParser($resultFactory);
                return new GoogleSearch($apiKey, $searchEngineId, $parser);
            default:
                throw SearchEngineException::invalidName($name);
        }
    }
}
