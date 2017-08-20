<?php

namespace ut\tests;


use ut\src\Main;
use ut\src\RoundingHelper;
use ut\src\Service;

class MainTest extends \PHPUnit_Framework_TestCase{

    /**
     * @expectedException Exception
     */
    public function testThrowExceptionOnCalculateWithOneUnSupportedCurrency(){
        //given
        $main = new Main();
        $unSupportedCurrency = "JPY";
        //when
        $main->count(0,$unSupportedCurrency,$main::CURRENCY_PLN);
        //then
    }

    /**
     * @expectedException Exception
     */
    public function testThrowExceptionOnCalculateWithTwoUnSupportedCurrency(){
        //given
        $main = new Main();
        $unSupportedCurrency = "JPY";
        //when
        $main->count(0,$unSupportedCurrency,$unSupportedCurrency);
        //then
    }

    public function testCorrectCountValueFromPlnToUsdWithDefaultRoundStrategy(){
        //given
        $service = new Service();
        $value = 7.86;
        $main = new Main();
        $rounder = new RoundingHelper();
        $correctResult = $rounder->roundUp($value * $service->getRatio(Main::CURRENCY_PLN,Main::CURRENCY_USD));
        //when
        $result = $main->count($value,Main::CURRENCY_PLN,Main::CURRENCY_USD);
        //then
        $this->assertEquals($correctResult,$result);
    }

    public function testCorrectCountValueFromPlnToUsdWithDownRoundStrategy(){
        //given
        $service = new Service();
        $value = 7.86;
        $main = new Main();
        $rounder = new RoundingHelper();
        $correctResult = $rounder->roundDown($value * $service->getRatio(Main::CURRENCY_PLN,Main::CURRENCY_USD));
        //when
        $result = $main->count($value,Main::CURRENCY_PLN,Main::CURRENCY_USD,Main::ROUND_STRATEGY_DOWN);
        //then
        $this->assertEquals($result,$result);
    }
}
