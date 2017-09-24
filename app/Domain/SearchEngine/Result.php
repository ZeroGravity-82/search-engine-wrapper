<?php

namespace App\Domain\SearchEngine;

/**
 * Class Result
 */
class Result
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $summary;

    /**
     * Result constructor.
     * @param string $title
     * @param string $url
     * @param string $summary
     */
    public function __construct($title, $url, $summary)
    {
        $this->title = $title;
        $this->url = $url;
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }
}
