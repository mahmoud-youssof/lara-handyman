<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Redirect;


class ViewController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $allCategories = DB::table('categories')->get();
        $workers = DB::table('workers')->limit(6)->Join('categories', 'cat-id', '=', 'categories_id')->get();
        $about = DB::table('about')->get();

        // dd($workers );

        return view('app.index', ['allCategories'=> $allCategories ,'workers'=> $workers, 'about'=> $about ]);

    }

    public function services()
    {
        $allCategories = DB::table('categories')->get();

        $workers = DB::table('workers')->Join('categories', 'cat-id', '=', 'categories_id')->paginate(16);

        return view('app.services', ['allCategories'=> $allCategories , 'workers'=> $workers ]);

    }

    public function servicesid($categoryid)
    {

        $allCategories = DB::table('categories')->where('categories_id' , $categoryid )->get();

        $workers = DB::table('workers')->where('cat-id' , $categoryid )->Join('categories', 'cat-id', '=', 'categories_id')->paginate(16);

        return view('app.services', ['allCategories'=> $allCategories , 'workers'=> $workers ]);

    }

    public function about()
    {
        $about = DB::table('about')->get();
        return view('app.about', ['about'=> $about ]);

    }
    public function contact(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $message = $request['message'];

        // DB::insert('insert into messeges (name, email ,phone ,message) values ($name, $email,$phone,$message,)');

        DB::table('messeges')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message
        ]);

        return back()->with('alert-success', 'We have received your message Thank U.');
    }
    public function message( )
    {

        return view('app.contact');
    }
}
