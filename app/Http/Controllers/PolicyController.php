<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PolicyController extends Controller
{
    public function showCookiePolicy($locale)
    {
        return Inertia::render('Policy/showCookiePolicy');
    }
    public function showPrivacyPolicy($locale)
    {
        return Inertia::render('Policy/showPrivacyPolicy');
    }
    public function showTermsAndConditions($locale)
    {
        return Inertia::render('Policy/showTermsAndConditions');
    }
    public function showImprint($locale)
    {
        return Inertia::render('Policy/showImprint');
    }
}
