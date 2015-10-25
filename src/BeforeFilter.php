<?php

namespace Plum\PlumDate;

use DateTime;
use Plum\Plum\Filter\FilterInterface;

/**
 * BeforeFilter.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class BeforeFilter implements FilterInterface
{
    /**
     * @var DateTime
     */
    private $beforeDateTime;

    /**
     * @param DateTime $beforeDateTime
     *
     * @codeCoverageIgnore
     */
    public function __construct(DateTime $beforeDateTime)
    {
        $this->beforeDateTime = $beforeDateTime;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function filter($item)
    {
        return $item < $this->beforeDateTime;
    }
}
