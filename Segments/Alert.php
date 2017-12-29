<?php

class Alert extends AbstractSegment implements SegmentInterface
{

    const ALERT_FILE = __DIR__ . "/../Local/alert.txt";

    private $segmentElements = [];

    public function __construct()
    {
        $this->init();
    }

    public function getSegmentData()
    {
        if ($this->segmentElements) {
            return "[alert]";
        }
    }

    public function getAdditionalSegmentData()
    {
        if ($this->segmentElements) {
            return "alert:\n"
                    . $this->getStyleCode([Codes::RESET_ALL_ATTRIBUTES])
                    . implode($this->segmentElements);
        }
    }

    private function init()
    {
        if (file_exists(self::ALERT_FILE)) {
            $alertData = trim(file_get_contents(self::ALERT_FILE));
            if ($alertData) {
                $this->segmentElements[] = "{$alertData}";
            }
        }
    }

}
