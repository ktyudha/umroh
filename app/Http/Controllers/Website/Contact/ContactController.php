<?php

namespace App\Http\Controllers\Website\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        view()->share('navbarActive', 'contact');
    }

    public function index()
    {
        return view('website.contact.index');
    }
}
