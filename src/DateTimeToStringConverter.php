<?php

namespace Plum\PlumDate;

use DateTime;
use InvalidArgumentException;
use Plum\Plum\Converter\ConverterInterface;

/**
 * DateTimeToStringConverter.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class DateTimeToStringConverter implements ConverterInterface
{
    /**
     * @var string
     */
    protected $format;

    /**
     * @param string $format
     *
     * @codeCoverageIgnore
     */
    public function __construct($format)
    {
        $this->format = $format;
    }

    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function convert($item)
    {
        if (!$item instanceof DateTime) {
            throw new InvalidArgumentException('The item given to Plum\PlumDate\DateTimeToStringConverter must be '.
                                                'an instance of DateTime.');
        }

        return $item->format($this->format);
    }
}
