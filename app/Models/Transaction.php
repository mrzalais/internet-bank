<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'amount',
        'description',
    ];

    public function transactionInDollars(): string
    {
        return '$' . $this->amount / 100;
    }
}
