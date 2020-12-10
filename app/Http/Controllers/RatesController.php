<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Repositories\CurrenciesRepository;

class RatesController extends Controller
{
    private $currenciesRepository;

    public function __construct(CurrenciesRepository $currenciesRepository)
    {
        $this->currenciesRepository = $currenciesRepository;
    }

    public function index()
    {
        $rates = $this->currenciesRepository->getRates();

        return view('rates', ['rates' => $rates]);
    }


    public function update(Request $request, $id)
    {
        //
    }
}
