<?php

namespace ut\src;

class RoundingHelper implements RoundingInterface
{

    public function roundUp($value)
    {
        $fig = (int) str_pad('1', 3, '0');
        return (ceil($value * $fig) / $fig);
    }

    public function roundDown($value)
    {
        $fig = (int) str_pad('1', 3, '0');
        return (floor($value * $fig) / $fig);
    }
}