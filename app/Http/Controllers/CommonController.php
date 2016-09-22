<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Model\Order;
use App\Http\Model\Item;
use App\Basket\Basket;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    protected $item;
    public $basket;
    public function __construct(Basket $basket,Item $item)
    {
        $this->basket=$basket;
        $this->item=$item;
        View::share('basket',$basket);
        dd($basket->all());
    }
    public function set(Basket $basket)
    {
        $this->basket=$basket;
    }
}
