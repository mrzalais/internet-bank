<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'balance',
        'currency_type',
    ];

    public function balanceInDollars(): string
    {
        return '$' . $this->balance / 100;
    }
}
