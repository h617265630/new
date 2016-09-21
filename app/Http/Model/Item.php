<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table="items";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'name'=>'required',
        'detail'=>'required',
        'price'=>'required',
    );

    public $quantity=null;
    public function hasLowStock()
    {
        if($this->outOfStock())
        {
            return false;
        }
        return (bool)($this->stock <= 5);
    }
    public function outOfStock()
    {
        return $this->stock === 0;
    }
    public function inStock()
    {
        return $this->stock >=1;
    }

    public function hasStock($quantity)
    {
        return $this->stock >= $quantity;
    }
}
