<?php

namespace App\Domain\SearchEngine;

use App\Domain\Exceptions\CurlException;

/**
 * Class AbstractSearch
 * Address to a search engine with GET-request using cURL.
 */
abstract class AbstractSearch
{
    /**
     * @var ResponseParserInterface
     */
    protected $parser;

    /**
     * @param string $query
     * @return array
     */
    public function find($query)
    {
        $query = urlencode($query);
        $response = $this->getResult($query);
        return $this->parser->process($response);
    }

    /**
     * @param string $query
     * @return string
     * @throws \App\Domain\Exceptions\CurlException In case of request url initialization failure.
     * @throws \App\Domain\Exceptions\CurlException In case of cURL session execution failure.
     * @throws \App\Domain\Exceptions\CurlException In case of unexpected response HTTP code.
     */
    protected function getResult($query)
    {
        $queryUrl = $this->getRequestUrl($query);
        $curlHandler = curl_init($queryUrl);
        if($curlHandler === false) {
            throw CurlException::initializationFailed();
        }
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_HEADER, false);
        $response = curl_exec($curlHandler);
        if($response === false) {
            curl_close($curlHandler);
            throw CurlException::executionFailed();
        }
        $responseCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
        curl_close($curlHandler);
        if($responseCode != 200) {
            throw CurlException::unexpectedResponseCode($responseCode, $response);
        }
        return $response;
    }

    /**
     * @param string $queryStringString
     * @return string
     */
    abstract protected function getRequestUrl($queryStringString);
}
