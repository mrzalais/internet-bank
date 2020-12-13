<?php

namespace App\Repositories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Collection;

class LatvijasBankaRepository implements CurrenciesRepository
{
    public function getRates(): Collection
    {
        Rate::query()->truncate();

        $xmlDoc = new \DOMDocument();
        $xmlDoc->load('https://www.bank.lv/vk/ecb.xml');
        $xmlTags = $xmlDoc->saveXML();
        $xmlObj = simplexml_load_string($xmlTags);

        for ($i = 0; $i < 32; $i++) {
            $currency = $xmlObj->Currencies->Currency[$i];
            $currencyId = $currency->ID;
            $currencyRate = $currency->Rate;

            $transaction = (new Rate)->fill(['rate_id' => $currencyId, 'rate' => $currencyRate]);

            $transaction->save();
        }

        $transaction = (new Rate)->fill(['rate_id' => 'EUR', 'rate' => 1]);

        $transaction->save();

        return $rates = Rate::all();
    }
}
