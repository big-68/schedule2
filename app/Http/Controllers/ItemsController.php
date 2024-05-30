<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nameItem' => ['required','string']
        ]);
        Item::create($validate);
        return redirect()->back();
    }

    public function update(Item $item, Request $request)
    {
        $item->update([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
