<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Calculator;
use App\Service\ArithmeticCalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CalculatorType;


class CalculatorController extends AbstractController
{
    private $arithmeticCalculatorService;

    public function __construct(ArithmeticCalculatorService $arithmeticCalculatorService)
    {
        $this->arithmeticCalculatorService = $arithmeticCalculatorService;
    }
    /**
     * @Route("/", name="home")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $result = null;
        $calculatorEntity = new Calculator();

        $form = $this->createForm(CalculatorType::class, $calculatorEntity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $result = $this->arithmeticCalculatorService->getResponseFromCalculator($form->get('operator')->getData(),$form->get('firstElement')->getData(), $form->get('secondElement')->getData());
        }


        return $this->render('index.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
        ]);
    }
}
