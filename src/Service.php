<?php

namespace ut\src;

class Service implements ServiceInterface
{
    public function getCurrentTime(){
        return time();
    }

    function getRatio($from, $to)
    {
        return 3.6;
    }
}