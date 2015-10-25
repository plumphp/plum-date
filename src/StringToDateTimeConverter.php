<?php

namespace Plum\PlumDate;

use DateTime;
use DateTimeZone;
use Plum\Plum\Converter\ConverterInterface;

/**
 * StringToDateTimeConverter.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class StringToDateTimeConverter implements ConverterInterface
{
    /**
     * @var DateTimeZone
     */
    protected $timeZone;

    /**
     * @param DateTimeZone|null $timeZone
     *
     * @codeCoverageIgnore
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
        return new DateTime($item, $this->timeZone);
    }
}
