<?php

class Duration
{
    /**
     * The time this class was initiated
     * @var string
     */
    public $startTime;

    public function __construct()
    {
        $this->startTime = microtime(true);
    }

    /**
     * Calculates the duration between $startTime property and the current
     * endTime
     * @return string Returns the difference
     */
    public function getDuration()
    {
        $endTime = microtime(true);

        return $executionTime = number_format($endTime - $this->startTime, 5);
    }

}