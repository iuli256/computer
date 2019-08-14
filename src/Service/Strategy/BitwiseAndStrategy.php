<?php


namespace App\Service\Strategy;

class BitwiseAndStrategy implements CalculatorInterface
{
    private const TYPE = 'bitwiseAnd';

    /**
     * {@inheritdoc}
     */
    public function isCalculable(string $type): bool
    {
        return self::TYPE === $type;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(int $firstElement, int $secondElement): int
    {
        return ($firstElement & $secondElement);
    }
}