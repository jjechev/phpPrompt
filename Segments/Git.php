<?php

class Git extends AbstractSegment implements SegmentInterface
{

    private $segment = '';
    private $files = [];
    private $branch;
    private $modified = 0;
    private $added = 0;
    private $deleted = 0;
    private $new = 0;
    private $renamed = 0;
    private $duration;
    private $maxDurationTime = 3; //sec
    private $stunDuration = 30;

    public function __construct()
    {
        $this->duration = new Duration();

        $lastLatency = DB::getInstance()->get('gitLastLatency');

        if ($lastLatency) {
            if ($lastLatency + $this->stunDuration > time()) {
                $this->segment .= $this->getStyleCode([self::BACKGROUND_COLOR_RED]) . "git: stun";
                return;
            }
        }

        $this->init();
    }

    public function __destruct()
    {
        $time = $this->duration->getDuration();
        if ($time > $this->maxDurationTime) {
            DB::getInstance()->set('gitLastLatency', time());
        }
    }

    public function getSegmentData()
    {
        return $this->segment;
    }

    public function getAdditionalSegmentData()
    {
        if ($this->files) {
            $out = 'Git: \n';
            $out .= $this->getStyleCode([self::RESET_ALL_ATTRIBUTES]);
            $out .= implode("\n", $this->files);
            return $out;
        }
    }

    private function init()
    {
        $this->colectData();
        $this->PS1();
    }

    private function PS1()
    {
        if ($this->files) {
            $this->segment .= $this->branch;
            if (count($this->files) > 1) {
//                $this->segment .= ":" . (count($this->files) - 1);

                if ($this->added) {
                    $this->segment .= " a:" . $this->added;
                }
                if ($this->modified) {
                    $this->segment .= " m:" . $this->modified;
                }
                if ($this->deleted) {
                    $this->segment .= " d:" . $this->deleted;
                }
                if ($this->new) {
                    $this->segment .= " n:" . $this->new;
                }
                if ($this->renamed) {
                    $this->segment .= " r:" . $this->renamed;
                }
            }
        }
    }

    private function colectData()
    {
        exec("git status --porcelain -b 2>&1", $out);

        if (strpos($out[0], 'fatal:') === false) {
            $this->files = $out;
            $this->branch = exec('git symbolic-ref --short HEAD', $branch);

            foreach ($this->files as $file) {
                $data = substr($file, 0, 2);
                if (strpos($data, "M") !== false) {
                    $this->modified++;
                }
                if (strpos($data, "D") !== false) {
                    $this->deleted++;
                }
                if (strpos($data, "A") !== false) {
                    $this->added++;
                }
                if (strpos($data, "R") !== false) {
                    $this->renamed++;
                }
                if (strpos($data, "??") !== false) {
                    $this->new++;
                }
            }
        }
    }

}
