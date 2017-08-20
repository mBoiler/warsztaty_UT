<?php
/**
 * Created by PhpStorm.
 * User: mBoiler
 * Date: 18.08.2017
 * Time: 23:33
 */

namespace ut\tests;

use ut\src\Main;
use ut\src\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testCheckResponseIsFloat(){
        //given
        $service = new Service();

        //when
        $response = $service->getRatio(Main::CURRENCY_PLN,Main::CURRENCY_EUR);

        //then
        $this->assertInternalType('float',$response);
    }

}
