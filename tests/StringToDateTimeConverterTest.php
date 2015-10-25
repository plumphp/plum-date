<?php

namespace Plum\PlumDate;

use DateTimeZone;
use PHPUnit_Framework_TestCase;

/**
 * StringToDateTimeConverterTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class StringToDateTimeConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\StringToDateTimeConverter::convert()
     */
    public function convertConvertsStringToDateTime()
    {
        $converter = new StringToDateTimeConverter();
        $date      = $converter->convert('2015-10-21 19:28');

        $this->assertInstanceOf('\DateTime', $date);
        $this->assertEquals('2015-10-21 19:28', $date->format('Y-m-d H:i'));
    }

    /**
     * @test
     * @covers Plum\PlumDate\StringToDateTimeConverter::convert()
     */
    public function convertConvertsStringToDateTimeWithTimeZone()
    {
        $converter = new StringToDateTimeConverter(new DateTimeZone('Europe/Vienna'));
        $date      = $converter->convert('2015-10-21 19:28');

        $this->assertInstanceOf('\DateTime', $date);
        $this->assertEquals('2015-10-21 19:28', $date->format('Y-m-d H:i'));
        $this->assertEquals('Europe/Vienna', $date->getTimeZone()->getName());
    }
}
