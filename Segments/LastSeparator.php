<?php

class LastSeparator extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return $this->getStyleCode([self::RESET_ALL_ATTRIBUTES]) . '$\n';
    }

}
