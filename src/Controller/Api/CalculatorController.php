<?php


namespace App\Controller\Api;

use App\Response\ApiResponse;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Calculator as Calculator;

class CalculatorController
{

    protected $calculatorService;

    public function __construct(Calculator $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function sum(Request $request, $a, $b)
    {
        return ApiResponse::generate($request, ['result' => $this->calculatorService->sum($a, $b)]);
    }

    public function minus(Request $request, $a, $b)
    {
        return ApiResponse::generate($request, ['result' => $this->calculatorService->minus($a, $b)]);
    }

    public function random(Request $request, $count, $min, $max)
    {
        return ApiResponse::generate($request, ['result' => $this->calculatorService->random($count, $min, $max)]);
    }

}