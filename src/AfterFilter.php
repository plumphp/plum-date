<?php

namespace Plum\PlumDate;

use DateTime;
use Plum\Plum\Filter\FilterInterface;

/**
 * AfterFilter.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class AfterFilter implements FilterInterface
{
    /**
     * @var DateTime
     */
    private $afterDateTime;

    /**
     * @param DateTime $afterDateTime
     *
     * @codeCoverageIgnore
     */
    public function __construct(DateTime $afterDateTime)
    {
        $this->afterDateTime = $afterDateTime;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function filter($item)
    {
        return $item > $this->afterDateTime;
    }
}
