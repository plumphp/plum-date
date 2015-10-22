<?php

namespace Plum\PlumDate;

use DateTimeZone;
use PHPUnit_Framework_TestCase;

/**
 * TimestampToDateTimeConverterTest
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class TimestampToDateTimeConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\TimestampToDateTimeConverter::convert()
     */
    public function convertConvertsStringToDateTime()
    {
        $converter = new TimestampToDateTimeConverter();
        $date = $converter->convert(1445448480);

        $this->assertInstanceOf('\DateTime', $date);
        $this->assertEquals(1445448480, $date->getTimestamp());
    }

    /**
     * @test
     * @covers Plum\PlumDate\TimestampToDateTimeConverter::convert()
     */
    public function convertConvertsStringToDateTimeWithTimeZone()
    {
        $converter = new TimestampToDateTimeConverter(new DateTimeZone('Europe/Paris'));
        $date = $converter->convert(1445448480);

        $this->assertInstanceOf('\DateTime', $date);
        $this->assertEquals(1445448480, $date->getTimestamp());
        $this->assertEquals('Europe/Paris', $date->getTimeZone()->getName());
    }
}
