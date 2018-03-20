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
        //$filesize = exec('du -sh 2>/dev/null');
        $filesize = "NA";
        exec('ls -1q | wc -l', $normalFiles);
        return "ls: all:" . $this->countFiles . " normal:" . $normalFiles[0] . " hidden:" . ($this->countFiles - $normalFiles[0]). " | total:".$filesize;
    }

}
