<?php

namespace App\helpers;
use App\Models\stores_affiliate;

use Illuminate\Support\Facades\Auth;

class MyHelper
{
    public static function getUsername()
    {
        return Auth::user()->user_name;
    }
    public static function getUserImagePath()
    {
        $user_id = Auth::user()->id;
        $logoPath = Stores_Affiliate::where('user_id', $user_id)->value('logo_path');

        return  $logoPath;
    }
    public static function getUserEmail()
    {
        $user_id = Auth::user()->id;
        $Email = Stores_Affiliate::where('user_id', $user_id)->value('affiliate_email');

        return  $Email;
    }
}
