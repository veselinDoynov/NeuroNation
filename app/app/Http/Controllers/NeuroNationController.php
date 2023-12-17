<?php

namespace App\Http\Controllers;

use App\Services\NeuroService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NeuroNationController extends Controller
{
    private NeuroService $neuroService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NeuroService $neuroService)
    {
        $this->neuroService = $neuroService;
    }

    public function getSessionSummary(int $userId) : \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
    {
        return response($this->neuroService->getSessionSummary($userId));
    }

    public function getSessionSummaryPerCategory(int $userId) : \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
    {
        return response($this->neuroService->getSessionSummaryPerCategory($userId));
    }
    public function getSessionDate(int $userId, string $identifier) : \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
    {
        return response($this->neuroService->getSessionDate($userId, $identifier));
    }


}
