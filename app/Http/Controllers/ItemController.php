<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Item;
use App\Http\Model\Order;
use App\Http\Model\OrderItem;
use App\Basket\Basket;
class ItemController extends CommonController
{
    public function itemContent()
    {
        return view('item.content');
    }

    public function itemEdit()
    {
        return view('item.edit');
    }
    public function search()
    {
        $input=Input::all();
        $item=Item::where('name',$input['name'])->first();
        if($item)
        {
            return view('item.content')->withItem($item);
        }
        else
        {
            return back()->withErrors('There is no such item.');
        }
    }
}
