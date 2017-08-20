<?php

namespace ut\tests;

use ut\src\RoundingHelper;

class RoundingHelperTest extends \PHPUnit_Framework_TestCase{

    function testCorrectRoundingUpWhenUseRoundingHelper(){
        //given
        $value = 0.8888;
        $roundingHelper = new RoundingHelper();
        //when
        $value = $roundingHelper->roundUp($value);
        //then
        $this->assertEquals(0.89,$value);
    }

    function testCorrectRoundingDownWhenUseRoundingHelper(){
        //given
        $value = 0.8888;
        $roundingHelper = new RoundingHelper();
        //when
        $value = $roundingHelper->roundDown($value);
        //then
        $this->assertEquals(0.88,$value);
    }
}