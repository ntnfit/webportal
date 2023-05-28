<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $title = 'List User';
        $search = $request->input('search') ?? "";
        if ($search != '') {
            $all_user = User::where('name', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orderBy('created_at', 'DESC')->get();
        } else {
            // $all_user = User::all()->sortByDesc('created_at');
            $all_user = User::latest()->simplepaginate(3);
        }
        $user = Auth::user();
        return view('users.index', compact('all_user', 'user', 'search', 'title'));
    }

    public function showCreate()
    {
        $title = 'Create new user';
        return view('users.create', compact('title'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/users')->with('message', 'Create new user successfully!');
    }

    public function edit($user_id)
    {
        $title = 'Edit User';
        $user = User::find($user_id);
        return view('users.edit', compact('user', 'title'));
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $user = User::find($user_id);

        if ($request->password == '') {
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'status' => $request->status,
            'password' => $password,
        ]);

        return redirect('/users')->with('message', 'Update user successfully!');
    }

    public function updatePassword(Request $request, $user_id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find($user_id);
        $user->update([
            'password' => bcrypt($request->password),
        ]);
        return redirect('/users')->with('message', 'Update password of user successfully!');
    }
}
