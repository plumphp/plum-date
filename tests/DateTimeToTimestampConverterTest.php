<?php

namespace Plum\PlumDate;

use DateTime;
use PHPUnit_Framework_TestCase;

/**
 * DateTimeToTimestampConverterTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class DateTimeToTimestampConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\DateTimeToTimestampConverter::convert()
     */
    public function convertConvertsDateTimeIntoTimestamp()
    {
        $converter = new DateTimeToTimestampConverter();
        $date      = new DateTime('2015-10-21 19:28:00');

        $this->assertEquals($date->getTimestamp(), $converter->convert($date));
    }

    /**
     * @test
     * @covers Plum\PlumDate\DateTimeToTimestampConverter::convert()
     * @expectedException \InvalidArgumentException
     */
    public function convertThrowsExceptionIfNoDateTimeObjectIsGiven()
    {
        $converter = new DateTimeToTimestampConverter();

        $converter->convert('invalid');
    }
}
