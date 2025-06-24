<?php

namespace App\Http\Controllers\Website\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'faq');
    }

    public function index()
    {
        return view('website.faq.index');
    }
}
