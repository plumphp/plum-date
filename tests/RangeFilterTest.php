<?php

namespace Plum\PlumDate;

use DateTime;
use DateTimeZone;
use PHPUnit_Framework_TestCase;

/**
 * RangeFilterTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 * @group     unit
 */
class RangeFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Plum\PlumDate\RangeFilter::filter()
     */
    public function filterReturnsTrueIfDateIsInRange()
    {
        $timeZone = new DateTimeZone('Europe/Vienna');
        $filter   = new RangeFilter(
            new DateTime('2000-01-01 00:00:00', $timeZone),
            new DateTime('2004-12-31 23:59:59', $timeZone)
        );

        $this->assertTrue($filter->filter(new DateTime('2000-01-01 00:00:00', $timeZone)));
        $this->assertTrue($filter->filter(new DateTime('2002-06-06 12:13:14', $timeZone)));
        $this->assertTrue($filter->filter(new DateTime('2004-12-31 23:59:59', $timeZone)));
    }

    /**
     * @test
     * @covers Plum\PlumDate\RangeFilter::filter()
     */
    public function filterReturnsFalseIfDateIsOutOfRange()
    {
        $timeZone = new DateTimeZone('Europe/Vienna');
        $filter   = new RangeFilter(
            new DateTime('2000-01-01 00:00:00', $timeZone),
            new DateTime('2004-12-31 23:59:59', $timeZone)
        );

        $this->assertFalse($filter->filter(new DateTime('1999-12-31 23:59:59', $timeZone)));
        $this->assertFalse($filter->filter(new DateTime('2005-01-01 00:00:00', $timeZone)));
        $this->assertFalse($filter->filter(new DateTime('1905-09-09 12:13:14', $timeZone)));
    }

    /**
     * @test
     * @covers Plum\PlumDate\RangeFilter::filter()
     * @expectedException \InvalidArgumentException
     */
    public function filterThrowsExceptionIfNoDate()
    {
        $timeZone = new DateTimeZone('Europe/Vienna');
        $filter   = new RangeFilter(
            new DateTime('2000-01-01 00:00:00', $timeZone),
            new DateTime('2004-12-31 23:59:59', $timeZone)
        );

        $filter->filter('invalid');
    }
}
