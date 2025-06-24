<?php

namespace App\Http\Controllers\Website\Registration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'registration');
    }

    public function index()
    {
        return view('website.registration.index');
    }
}
