<?php

namespace App\Service;

use App\Service\Strategy\OperatorContext;

/**
 * Class ArithmeticCalculatorService
 * @package App\Service
 */
class ArithmeticCalculatorService
{
    private $operatorContext;

    public function __construct(OperatorContext $operatorContext)
    {
        $this->operatorContext = $operatorContext;
    }

    /**
     * @param string $operator
     * @param int $firstElement
     * @param int $secondElement
     * @return mixed
     */
    public function getResponseFromCalculator(string $operator, int $firstElement, int $secondElement)
    {

        return $this->operatorContext->calculate($operator, $firstElement, $secondElement);
    }

}