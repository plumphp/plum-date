<?php

namespace Plum\PlumDate;

use DateTime;
use PHPUnit_Framework_TestCase;

/**
 * DateTimeToStringConverterTest
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class DateTimeToStringConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\DateTimeToStringConverter::convert()
     */
    public function convertConvertsDateTimeIntoString()
    {
        $converter = new DateTimeToStringConverter('Y-m-d H:i');

        $this->assertEquals('2015-10-21 19:28', $converter->convert(new DateTime('2015-10-21 19:28')));
    }

    /**
     * @test
     * @covers Plum\PlumDate\DateTimeToStringConverter::convert()
     * @expectedException \InvalidArgumentException
     */
    public function convertThrowsExceptionIfNoDateTimeObjectIsGiven()
    {
        $converter = new DateTimeToStringConverter('Y-m-d H:i');

        $converter->convert('invalid');
    }
}
