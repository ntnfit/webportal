<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $title = 'List Item';
        $search = $request->input('search') ?? "";
        if ($search != '') {
            $all_item = Item::where('name', 'like', "%$search%")->orderBy('created_at', 'DESC')->get();
        } else {
            $all_item = Item::latest()->simplepaginate(3);
        }
        return view('items.index', compact('title', 'all_item', 'search'));
    }

    public function showCreate()
    {
        $title = 'Create new item';
        return view('items.create', compact('title'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1'
        ]);
        $item = new Item();
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->quantity = $request->input('quantity');
        $item->save();
        return redirect('/items')->with('message', 'Create new item successfully!');
    }

    public function edit($item_id)
    {
        $title = 'Edit Item';
        $item = Item::find($item_id);
        return view('items.edit', compact('item', 'title'));
    }

    public function update(Request $request, $item_id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1',
        ]);

        $item = Item::find($item_id);
        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect('/items')->with('message', 'Update item successfully!');
    }
}
