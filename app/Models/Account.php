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
    ];

    public function balanceInDollars(): string
    {
        return '$' . $this->balance / 100;
    }

    public function withdraw(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }
}
