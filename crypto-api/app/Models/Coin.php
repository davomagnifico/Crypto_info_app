<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;
    protected $casts = [
        'ath_date' => 'datetime',
        'atl_date' => 'datetime',
        'last_updated' => 'datetime',
    ];

    public static function findWithIdentifier($identifier)
    {
        return self::where('id', $identifier)
            ->orWhere('crypto_id', $identifier)
            ->orWhere('symbol', $identifier)
            ->first();
    }
}
