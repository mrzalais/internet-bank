<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CurrenciesRepository
{
    public function getRates(): Collection;
}
