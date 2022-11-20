<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Redirect;

class adminController extends Controller
{

    public function viewcontact( )
    {
        $contacts = DB::table('messeges')->get();

        return view('app.viewcontact', ['contacts'=> $contacts ]);
    }
}
