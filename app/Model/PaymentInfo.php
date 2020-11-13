<?php

namespace App\Model;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $fillable = [
        'user_id',
        'card_number',
        'cvc',
        'card_expiration_month',
        'card_expiration_year',
        'amount',
        'deactivated_at',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpiredAtAttribute()
    {
        return Carbon::createFromFormat("Y-m-d", $this->attributes['expired_at'])->format("d-m-Y");
    }
}
