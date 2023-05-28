<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Purchasing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PurchasingController extends Controller
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
    public function index()
    {
        $title = 'Purchasing';
        $user = Auth::user();
        if ($user->role == 0) {
            $all_purchasing = Purchasing::all()->sortByDesc('created_at');
        } else {
            $all_purchasing = Purchasing::where('userID', '=', $user->id)->get();
        }
        return view('purchasing.index', compact('title', 'user', 'all_purchasing'));
    }

    public function create()
    {
        $title = 'Create new purchasing';
        $user = Auth::user();
        $all_item = Item::all();
        return view('purchasing.create', compact('title', 'user', 'all_item'));
    }

    public function insert(Request $request)
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_PD = 'MT';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $pin_PD = mt_rand(12, 27)
            . mt_rand(12, 27)
            . $characters_PD[rand(0, strlen($characters_PD) - 1)];

        $request->validate([
            'item_name' => 'required',
            'item_price' => 'required|min:1',
            'item_quantity' => 'required|min:1',
        ]);

        $user = Auth::user();
        $purchasing = new Purchasing();
        $purchasing->id = $pin;
        $purchasing->userID = $user->id;
        $purchasing->name = $user->name;
        $purchasing->email = $user->email;
        $purchasing->purchasing_detail_id = $pin_PD;
        $purchasing->quantity = 1;
        $purchasing->total = 300000;
        $purchasing->save();

        return redirect('/purchasing')->with('message', 'Create new purchasing successfully!');
    }
}
