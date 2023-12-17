<?php

namespace App\Http\Controllers;

use App\Services\NeuroService;

class ExampleController extends Controller
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

    public function test()
    {
        return $this->neuroService->test();
    }

    //
}
