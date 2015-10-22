<?php

namespace Plum\PlumDate;

use DateTime;
use DateTimeZone;
use Plum\Plum\Converter\ConverterInterface;

/**
 * TimestampToDateTimeConverter
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class TimestampToDateTimeConverter implements ConverterInterface
{
    /**
     * @var DateTimeZone|null
     */
    protected $timeZone;

    /**
     * @param DateTimeZone|null $timeZone
     */
    public function __construct(DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function convert($item)
    {
        $date = new DateTime('now', $this->timeZone);
        $date->setTimestamp($item);

        return $date;
    }
}
