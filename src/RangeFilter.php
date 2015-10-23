<?php

namespace Plum\PlumDate;

use DateTime;
use Plum\Plum\Filter\FilterInterface;

/**
 * RangeFilter
 *
 * @package   Plum\PlumDate
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class RangeFilter implements FilterInterface
{
    /**
     * @var DateTime
     */
    private $startDateTime;

    /**
     * @var DateTime
     */
    private $endDateTime;

    /**
     * @param DateTime $startDateTime
     * @param DateTime $endDateTime
     *
     * @codeCoverageIgnore
     */
    public function __construct(DateTime $startDateTime, DateTime $endDateTime)
    {
        $this->startDateTime = $startDateTime;
        $this->endDateTime   = $endDateTime;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function filter($item)
    {
        if (!$item instanceof DateTime) {
            throw new \InvalidArgumentException('The item passed to Plum\PlumDate\RangeFilter must be an instance of '.
                                                'DateTime.');
        }

        return $item >= $this->startDateTime && $item <= $this->endDateTime;
    }
}
