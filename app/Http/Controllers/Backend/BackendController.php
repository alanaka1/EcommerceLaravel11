<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Session};

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('Ecommerce.Backend.index');
    }

    public function user_logout()
    {
        Auth::logout();
        Session::flush();

        return redirect(route('home'));
    }
}
