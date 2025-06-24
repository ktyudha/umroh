<?php

namespace App\Http\Controllers\Website\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inbox;

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

    public function store(Request $request)
    {

        $request->validate([
            // 'g-recaptcha-response' => ['required', new ReCaptcha],
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string|max:500',
        ]);

        $inbox = new Inbox();

        $inbox['email'] = $request->email;
        $inbox['name'] = $request->name;
        $inbox['phone'] = $request->phone;
        $inbox['subject'] = $request->subject;
        $inbox['description'] = $request->message;

        if ($inbox->save()) {
            return redirect()->route('contact.index')->with(['status' => 'success', 'message' => 'Pesan Anda Sudah Terkirim']);
        }
        return redirect()->route('contact.index')->with(['status' => 'danger', 'message' => 'Gagal, Coba lagi nanti']);
    }
}
