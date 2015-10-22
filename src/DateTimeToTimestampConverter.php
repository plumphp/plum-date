<?php

namespace Plum\PlumDate;

use DateTime;
use InvalidArgumentException;
use Plum\Plum\Converter\ConverterInterface;

/**
 * DateTimeToTimestampConverter
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class DateTimeToTimestampConverter implements ConverterInterface
{
    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function convert($item)
    {
        if (!$item instanceof DateTime) {
            throw new InvalidArgumentException('The item given to Plum\PlumDate\DateTimeToTimestampConverter must '.
                                               'be an instance of DateTime.');
        }

        return $item->getTimestamp();
    }
}
