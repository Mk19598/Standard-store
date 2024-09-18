<?php

namespace App\Helpers;
use Illuminate\Support\Facades\URL; 
use App\Models\SiteSetting;
use Carbon\Carbon;

class CustomHelper
{
    public static function Get_website_name()
    {
        $website_name = SiteSetting::query()->pluck('website_name')->first();
        return $website_name;
    }

    public static function Get_website_logo_url()
    {
        $website_logo_url = SiteSetting::query()->pluck('website_logo_url')->first();
        return $website_logo_url;
    }
}