<?php

namespace App\Tests;

use App\Service\ArithmeticCalculatorService;
use App\Service\Strategy\DivisionStrategy;
use App\Service\Strategy\MinusStrategy;
use App\Service\Strategy\MultiplicationStrategy;
use App\Service\Strategy\OperatorContext;
use App\Service\Strategy\PlusStrategy;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class CalculatorServiceTest extends TestCase
{
    /** @var ArithmeticCalculatorService $calculatorService */
    protected $calculatorService;

    /** @var OperatorContext $operatorContext */
    protected $operatorContext;

    /** @var PlusStrategy $strategyPlus */
    protected $strategyPlus;

    /** @var MinusStrategy $strategyMinus */
    protected $strategyMinus;

    /** @var MultiplicationStrategy $strategyMultiplication */
    protected $strategyMultiplication;

    /** @var DivisionStrategy $strategyDivision */
    protected $strategyDivision;

    protected function setUp()
    {
        parent::setUp();

        $this->calculatorService = m::mock(ArithmeticCalculatorService::class)->makePartial();
        $this->operatorContext = new OperatorContext();

        $this->strategyPlus = m::mock(PlusStrategy::class)->makePartial();
        $this->strategyPlus->expects("isCalculable")->andReturn('true');

        $this->strategyMinus = m::mock(MinusStrategy::class)->makePartial();
        $this->strategyMinus->expects("isCalculable")->andReturn('true');

        $this->strategyMultiplication = m::mock(MultiplicationStrategy::class)->makePartial();
        $this->strategyMultiplication->expects("isCalculable")->andReturn('true');

        $this->strategyDivision = m::mock(DivisionStrategy::class)->makePartial();
        $this->strategyDivision->expects("isCalculable")->andReturn('true');

        $this->calculatorService = new ArithmeticCalculatorService($this->operatorContext);
    }

    public function testCalculateOperatorPlus()
    {
        $this->operatorContext
            ->addStrategy($this->strategyPlus);

        $response = $this->calculatorService->getResponseFromCalculator("plus", 7,3);

        $this->assertEquals(10, $response);
    }

    public function testCalculateOperatorMinus()
    {
        $this->operatorContext
            ->addStrategy($this->strategyMinus);

        $response = $this->calculatorService->getResponseFromCalculator("minus", 7,3);

        $this->assertEquals(4, $response);
    }

    public function testCalculateOperatorMultiplication()
    {
        $this->operatorContext
            ->addStrategy($this->strategyMultiplication);

        $response = $this->calculatorService->getResponseFromCalculator("multiplication", 7,3);

        $this->assertEquals(21, $response);
    }

    public function testCalculateOperatorDivision()
    {
        $this->operatorContext
            ->addStrategy($this->strategyDivision);

        $response = $this->calculatorService->getResponseFromCalculator("multiplication", 8,2);

        $this->assertEquals(4, $response);
    }
}
