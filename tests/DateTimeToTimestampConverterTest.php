<?php

namespace Plum\PlumDate;

use DateTime;
use PHPUnit_Framework_TestCase;

/**
 * DateTimeToTimestampConverterTest
 *
 * @package   Plum\PlumDate
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

        $this->assertEquals(1445448480, $converter->convert(new DateTime('2015-10-21 19:28:00')));
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
