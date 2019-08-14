<?php


namespace App\Service\Strategy;

interface CalculatorInterface
{
    /**
     * @param int $type
     *
     * @return bool
     */
    public function isCalculable(string $type): bool;

    /**
     * @param int $firstElement
     * @param int $secondElement
     * @return int
     */
    public function calculate(int $firstElement, int $secondElement): int;
}