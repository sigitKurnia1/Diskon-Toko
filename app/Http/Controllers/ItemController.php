<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    public function shopPage () {
        $data = Item::get();

        return view('shop.item', compact('data'));
    }

    public function addItem () {
        return view('shop.addItem');
    }

    public function postAddItem (Request $request) {
        $request->validate([
            'item_name' => 'required',
            'item_desc' => 'required',
            'item_price' => 'required',
            'item_image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $item = new Item;

        $item->item_name = $request->item_name;
        $item->item_desc = $request->item_desc;
        $item->item_price = $request->item_price;

        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/item', $filename);
            $item->item_image = $filename;
        }

        $item->save();

        if ($item) {
            Alert::success('Success!', 'New item has been added!');
            return redirect('/shopPage');
        } else {
            Alert::error('Failed!', 'Something went wrong, try again later!');
            return redirect('/addItem');
        }
    }
}
