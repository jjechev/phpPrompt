<?php

class Application
{

    private $segmentsOutputCode;
    private $argv;
    private $argc;
    private $segments;
    private $lastSeparator = '$ ';
    private $container = [];
    private $db;
    private $theme;
    private $doubleClickTime = 0.18;

    public function __construct($argv, $argc, $themeName = 'default')
    {
        array_shift($argv);
        $this->argv = $argv;
        $this->argc = $argc - 1;

        $this->segments = array_map('ucfirst', $argv);

        $this->db = DB::getInstance();
        $this->theme = new Theme($themeName);
        $this->init();
    }

    public function __toString()
    {
        return implode($this->segmentsOutputCode);
    }

    private function init()
    {
        $this->generateDoubleClick();
        $this->generatePS1();
        $this->setExecutionTime();
    }

    private function generateDoubleClick()
    {

        if ($this->microtime_float() - $this->getExecutionTime() < $this->doubleClickTime) {
            $this->loadAllSegmentsDoubleClick();
        }
    }

    private function generatePS1()
    {
        if ($this->argc) {
            $this->loadAllSegmentsPS1();
        } else {
            $this->loadDefaultPrompt();
        }
    }

    private function loadSegment($segmentName)
    {
        $segmentData = $this->getSegmentInstance($segmentName)->getSegmentData();
        if ($segmentData) {
            $this->segmentsOutputCode[] = $this->theme->getSegmentCodes($segmentName);

            $this->segmentsOutputCode[] = $segmentData;
            /* RESET_ALL_ATTRIBUTES */
            $this->segmentsOutputCode[] = "\[\033[00m\]";
            /* add space */
            $this->segmentsOutputCode[] = " ";
        }

        /* last separator */
        $lastSeparator = $this->getSegmentInstance($segmentName)->getLastSeparator();
        if ($lastSeparator) {
            $this->lastSeparator = $lastSeparator;
        }
    }

    private function loadDefaultPrompt()
    {
        $this->loadSegment('ClassicPrompt');
    }

    private function getSegmentInstance($segmentName)
    {
        if (!isset($this->container[$segmentName])) {
            if (class_exists($segmentName)) {
                $this->container[$segmentName] = new $segmentName;
            } else {
                return $this->container[$segmentName] = new NullObject();
            }
        }
        return $this->container[$segmentName];
    }

    private function loadAllSegmentsPS1()
    {

        foreach ($this->segments as $segment) {
            $this->loadSegment($segment);
        }
        $this->segmentsOutputCode[] = $this->lastSeparator;
    }

    private function loadAllSegmentsDoubleClick()
    {
        $this->segmentsOutputCode[] = '\n';
        foreach ($this->segments as $segment) {
            $segmentData = $this->getSegmentInstance($segment)->getAdditionalSegmentData();
            if ($segmentData) {
                $this->segmentsOutputCode[] = $this->theme->getAdditionalSegmentCodes($segment);

                $this->segmentsOutputCode[] = $segmentData;
                /* RESET_ALL_ATTRIBUTES */
                $this->segmentsOutputCode[] = "\[\033[00m\]";
                /* new line */
                $this->segmentsOutputCode[] = '\n';
            }
        }
        $this->segmentsOutputCode[] = '\n';
    }

    private function setExecutionTime()
    {
        $this->db->set('time', $this->microtime_float());
    }

    private function getExecutionTime()
    {
        return $this->db->get('time');
    }

    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

}
