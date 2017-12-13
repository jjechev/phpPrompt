<?php

class Clock extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return '[' . self::TIME . ']';
    }

    public function getAdditionalSegmentData()
    {
        return "time: " . self::TIME . " " . self::DATE;
    }

}
