<?php

class ClassicPrompt 
{
   public function getSegmentData()
   {
       return '\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$';
   }
}