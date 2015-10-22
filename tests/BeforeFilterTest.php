<?php

namespace Plum\PlumDate;

use DateTime;
use DateTimeZone;
use PHPUnit_Framework_TestCase;

/**
 * BeforeFilterTest
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class BeforeFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\BeforeFilter::filter()
     */
    public function filterReturnsTrueForDateTimeBeforeDate()
    {
        $timeZone = new DateTimeZone('Europe/Vienna');
        $filter   = new BeforeFilter(new DateTime('2015-10-21 19:28:00', $timeZone));

        $this->assertTrue($filter->filter(new DateTime('2015-10-21 19:27:59', $timeZone)));
        $this->assertTrue($filter->filter(new DateTime('1985-10-26 21:00:00', $timeZone)));
        $this->assertTrue($filter->filter(new DateTime('1955-11-12 18:38:00', $timeZone)));
    }

    /**
     * @test
     * @covers Plum\PlumDate\BeforeFilter::filter()
     */
    public function filterReturnsFalseForDateTimeAfterDate()
    {
        $timeZone = new DateTimeZone('Europe/Vienna');
        $filter   = new BeforeFilter(new DateTime('2015-10-21 19:28:00', $timeZone));

        $this->assertFalse($filter->filter(new DateTime('2015-10-21 19:28:00', $timeZone)));
        $this->assertFalse($filter->filter(new DateTime('2015-10-26 21:00:00', $timeZone)));
    }
}
