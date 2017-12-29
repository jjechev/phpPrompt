<?php

class Theme extends Codes
{

    private $themeData;

    public function __construct($theme)
    {
        $file = __DIR__ . "/../Themes/" . $theme . ".php";
        if (file_exists($file)) {
            $this->themeData = require $file;
        }else{
            $this->themeData = [];
        }
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
