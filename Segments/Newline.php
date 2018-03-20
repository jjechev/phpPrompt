<?php

class Newline extends AbstractSegment implements SegmentInterface
{

    public function getLastSeparator()
    {
        return "\n] ";
    }

}
