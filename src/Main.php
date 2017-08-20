<?php

namespace ut\src;

use Exception;

class Main
{

    const ROUND_STRATEGY_UP = "up";
    const ROUND_STRATEGY_DOWN = "down";

    const CURRENCY_USD = "USD";
    const CURRENCY_PLN = "PLN";
    const CURRENCY_EUR = "EUR";

    public function count($value, $from, $to, $roundStratedy = "up")
    {
        $support_currency = array(0=>$this::CURRENCY_EUR,1=>$this::CURRENCY_PLN,2=>$this::CURRENCY_USD);

        if (!array_search($from,$support_currency)|| !array_search($to,$support_currency)) {
            throw new Exception("NOT SUPPORTED CURRENCY");
        }

        $rounder = new RoundingHelper();
        $service = new Service();
        $ratio = $service->getRatio($from, $to);

        $result = $ratio * $value;

        switch ($roundStratedy) {
            case $this::ROUND_STRATEGY_UP:
                $result = $rounder->roundUp($result);
                break;
            case $this::ROUND_STRATEGY_DOWN:
                $result = $rounder->roundDown($result);
                break;
        }

        return $result;

    }

}