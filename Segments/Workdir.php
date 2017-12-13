<?php

class Workdir extends AbstractSegment implements SegmentInterface
{

    private $pwd;

    public function __construct()
    {
        exec("pwd", $out);
        $this->pwd = implode($out);
    }

    public function getSegmentData()
    {
        return '\w';
    }

    public function getAdditionalSegmentData()
    {

        return 'pwd: ' . $this->pwd;
    }

}
