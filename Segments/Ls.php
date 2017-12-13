<?php

class Ls extends AbstractSegment implements SegmentInterface
{

    private $countFiles;

    public function __construct()
    {
        exec('ls -a1q | wc -l', $out);
        $this->countFiles = trim($out[0] - 2);
    }

    public function getSegmentData()
    {
        return 'ls:' . $this->countFiles;
    }

    public function getAdditionalSegmentData()
    {
        exec('ls -1q | wc -l', $out);
        return "ls: all:" . $this->countFiles . " normal:" . $out[0] . " hidden:" . ($this->countFiles - $out[0]);
    }

}
