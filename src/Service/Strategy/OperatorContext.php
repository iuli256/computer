<?php

namespace App\Service\Strategy;

class OperatorContext
{
    /**
     * @var array
     */
    private $strategies;

    /**
     * @param CalculatorInterface $strategy
     */
    public function addStrategy(CalculatorInterface $strategy)
    {
        $this->strategies[] = $strategy;
    }

    /**
     * @param string $operator
     * @param int $firstElement
     * @param int $secondElement
     * @return int
     */
    public function calculate(string $operator, int $firstElement, int $secondElement): int
    {
        /** @var CalculatorInterface $strategy */
        foreach ($this->strategies as $strategy) {
            if ($strategy->isCalculable($operator)) {
                return $strategy->calculate($firstElement, $secondElement);
            }
        }

        throw new \InvalidArgumentException('Operator type not found');
    }
}