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

    public function deletecontact($contactid )
    {
        $contacts = DB::table('messeges')->where('id' , $contactid )->delete();

        return back()->with('alert-danger', 'You have Deleted a messege.');
    }
    public function viewservies( )
    {
        $servies = DB::table('categories')->get();

        return view('app.viewservies', ['servies'=> $servies ]);
    }

    public function editservies( )
    {
        $contacts = DB::table('messeges')->get();

        return view('app.viewcontact', ['contacts'=> $contacts ]);
    }
    public function categorypost(Request $request)
    {
// dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'Description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $name = $request['name'];
        $Description = $request['Description'];


        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('image'), $imageName);


        // DB::insert('insert into messeges (name, email ,phone ,message) values ($name, $email,$phone,$message,)');

        DB::table('categories')->insert([
            'categories_name' => $name,
            'categories_description' => $Description,
            'categories_image' => $imageName

        ]);

        return back()->with('alert-success', 'You have Added a new category Thank U.');
    }

    public function categoryupdate(Request $request , $categoriesid)
    {
// dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'Description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $name = $request['name'];
        $Description = $request['Description'];


        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('image'), $imageName);


        // DB::insert('insert into messeges (name, email ,phone ,message) values ($name, $email,$phone,$message,)');

        DB::table('categories')->where('categories_id', $categoriesid)->update([
            'categories_name' => $name,
            'categories_description' => $Description,
            'categories_image' => $imageName

        ]);

        return back()->with('alert-success', 'You have Edited The category Thank U.');
    }
    public function deleteservies($categoriesid )
    {
        $servies = DB::table('categories')->where('id' , $categoriesid )->delete();

        return back()->with('alert-danger', 'You have Deleted a Categories.');
    }



    public function viewworkers( )
    {
        $workers = DB::table('workers')->get();
        $categories = DB::table('categories')->get();

        return view('app.viewworkers', ['workers'=> $workers , 'categories'=>$categories ]);
    }

    public function workerpost(Request $request)
    {
// dd($request);
        $validated = $request->validate([
            'categoryid'=>'required',
            'name' => 'required',
            'descreption' => 'required',
            'whatsapp' => 'required',
            'instgram' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $categoryid = $request['categoryid'];
        $name = $request['name'];
        $descreption = $request['descreption'];
        $whatsapp = $request['whatsapp'];
        $instgram = $request['instgram'];

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('image'), $imageName);


        // DB::insert('insert into messeges (name, email ,phone ,message) values ($name, $email,$phone,$message,)');

        DB::table('workers')->insert([
            'cat-id'=>$categoryid,
            'name' => $name,
            'description' => $descreption,
            'whatsapp' => $whatsapp,
            'instgram' => $instgram,
            'image' => $imageName

        ]);

        return back()->with('alert-success', 'You have Added a new Worker Thank U.');
    }

    public function workerupdate(Request $request , $workerid)
    {
// dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'whatsapp' => 'required',
            'instgram' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $name = $request['name'];
        $description = $request['description'];
        $whatsapp = $request['whatsapp'];
        $instgram = $request['instgram'];


        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('image'), $imageName);


        // DB::insert('insert into messeges (name, email ,phone ,message) values ($name, $email,$phone,$message,)');
        DB::table('workers')->where('id', $workerid)->update([
            'name' => $name,
            'description' => $description,
            'whatsapp' => $whatsapp,
            'instgram' => $instgram,
            'image' => $imageName

        ]);

        return back()->with('alert-success', 'You have Edited The Worker Info Thank U.');
    }
    public function deleteworker($workerid )
    {
        $workers = DB::table('workers')->where('id' , $workerid )->delete();

        return back()->with('alert-danger', 'You have Deleted a Worker.');
    }
    public function viewusers( )
    {
        $users = DB::table('users')->get();

        return view('app.viewusers', ['users'=> $users ]);
    }

    public function useradmin($userid )
    {
        $userinfo = DB::table('users')->where('id', $userid)->first();

        if($userinfo->admin == 0){
            $newrole = 1;
        }elseif ($userinfo->admin == 1){
            $newrole = 0;

        }
        $user = DB::table('users')->where( 'id' , $userid  )->update(['admin' => $newrole]);
        return back()->with('alert-success', 'You have Updated your User Role.');
    }


}
