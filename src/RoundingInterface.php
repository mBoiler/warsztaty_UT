<?php

namespace ut\src;

interface RoundingInterface
{
    function roundUp($value);
    function roundDown($value);
}