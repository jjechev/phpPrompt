<?php

class Theme extends Codes
{

    private $themeData;

    public function __construct($theme)
    {
        $this->themeData = require __DIR__ . "/../Themes/" . $theme . ".php";
    }

    public function getSegmentCodes($segmentName)
    {
        if (isset($this->themeData[$segmentName]['segmentStyle'])) {
            return $this->getStyleCode($this->themeData[$segmentName]['segmentStyle']);
        }
    }

    public function getAdditionalSegmentCodes($segmentName)
    {
        if (isset($this->themeData[$segmentName]['additionalSegmentStyle'])) {
            return $this->getStyleCode($this->themeData[$segmentName]['additionalSegmentStyle']);
        }
    }
}
