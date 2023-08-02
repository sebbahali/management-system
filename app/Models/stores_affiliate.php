<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stores_affiliate extends Model
{
    use HasFactory;
    protected $fillable = [
        'affiliate_first_name',

        'affiliate_last_name',
        'affiliate_email',
        'affiliate_address',
        'preferred_payment_method',
        'sender_name',
        'phone_number',
        'user_id',
        'logo_path'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
