<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use App\Models\Transaction;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function accounts(): hasMany
    {
        return $this->hasMany(Account::class, 'owner_id');
    }

    public function sentTransactions(): Collection
    {
        $accounts = auth()->user()->accounts;

        $sentTransactions = Collection::empty();

        foreach ($accounts as $account) {
            $sent = Transaction::where('from_user_account_id', $account->name)->get();

            if ($sent->count() !== 0) {
                $sentTransactions = $sentTransactions->concat($sent);
            }
        }

        return $sentTransactions;
    }

    public function receivedTransactions(): Collection
    {
        $accounts = auth()->user()->accounts;

        $receivedTransactions = Collection::empty();

        foreach ($accounts as $account) {
            $received = Transaction::where('to_user_account_id', $account->name)->get();

            if ($received->count() !== 0) {
                $receivedTransactions = $received;
            }

            $sent = Transaction::where('from_user_account_id', $account->name)->get();

            if ($sent->count() !== 0) {
                $receivedTransactions = $receivedTransactions->concat($sent);
            }
        }

        return $receivedTransactions;
    }
}
