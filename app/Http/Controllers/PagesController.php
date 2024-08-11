<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $user = User::whereNotIn('typeofuser', ['admin', 'developer'])->get();
        return view('customer', ['user' => $user]);
    }
    //edit in customer page
    public function customer_edit(string $id)
    {
        $user = user::find($id);
        return view('customer_edit', ['user' => $user]);
    }
    //update  in customer page
    public function customer_update(Request $request, string $id)
    {
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->typeofuser = $request->typeofuser;
        $user->save();
        return redirect(route('pages.customer'))->with('status', 'user Updated !');
    }
    //delete in customer page
    public function customer_delete(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect(route('pages.customer'))->with('status', 'User deleted successfully!');
        }

        return redirect(route('pages.customer'))->with('error', 'User not found!');
    }
    //view the data
    public function showcustomer($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('customer_detail', compact('user'));
        } else {
            return redirect()->route('pages.customer')->with('error', 'User not found');
        }
    }
    //end
    public function developer()
    {
        $devs = User::where('typeofuser', 'developer')->get();
        return view('developer', ['user' => $devs]);
    }
//
    //edit in developer page
//
    public function developer_edit(string $id)
    {
        $user = user::find($id);
        return view('developer_edit', ['user' => $user]);
    }
    //update  in developer page
    public function developer_update(Request $request, string $id)
    {
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->typeofuser = $request->typeofuser;
        $user->save();
        return redirect(route('pages.developer'))->with('status', 'user Updated !');
    }
    //delete in developer page
    public function developer_delete(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect(route('pages.developer'))->with('status', 'User deleted successfully!');
        }

        return redirect(route('pages.developer'))->with('error', 'User not found!');
    }
    //view the data
    public function showdeveloper($id)
{
    $user = User::find($id);

    if ($user) {
        return view('developer_detail', compact('user'));
    } else {
        return redirect()->route('pages.developer')->with('error', 'User not found');
    }
}
    //end
//
     //other  pages the blog is in the BlogController
//
 
    public function community()
    {
        return view('community');
    }
    public function events()
    {
        return view('events.index');
    }
    public function tasks()
    {
        return view('tasks');
    }
    public function telegram_managment()
    {
        return view('telegram_managment');
    }
    
}
