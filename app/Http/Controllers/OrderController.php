<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Basket\Basket;
use App\Http\Model\Item;
use Illuminate\Support\Facades\Input;

class OrderController extends CommonController
{
    protected $item;
    protected $basket;
    public function __construct(Basket $basket,Item $item)
    {
        $this->basket=$basket;
        $this->item=$item;
    }

    public function add($id,Basket $basket)
    {
        $input=Input::all();
        $item=Item::find($id);
        $quantity=$input['quantity'];
        if($item)
        {
            $this->basket->add($item,$quantity);
        }
        return view('order.index',compact('basket',$this->basket));
    }

    public function basketall()
    {
        return view('order.index',compact('basket'));
    }
}
