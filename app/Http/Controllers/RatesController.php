<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class RatesController extends Controller
{
    public function index()
    {
        $xmlDoc = new \DOMDocument();
        $xmlDoc->load('https://www.bank.lv/vk/ecb.xml');
        $xmlTags = $xmlDoc->saveXML();
        $xmlObj = simplexml_load_string($xmlTags);

        $currencyArray = [];

        for ($i = 0; $i < 30; $i++) {
            $currency = $xmlObj->Currencies->Currency[$i];
            $currencyId = $currency->ID;
            $currencyRate = $currency->Rate;
        }



        return view('rates', ['currencyArray' => $currencyArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
