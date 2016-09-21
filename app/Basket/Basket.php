<?php

namespace App\Basket;
use App\Http\Model\item;
use App\Http\Support\Contracts\StorageInterface;

class Basket
{
    protected $storage;
    protected $item;
    public function __construct(StorageInterface $storage,item $item)
    {
        $this->storage=$storage;
        $this->item=$item;
    }

    public function add(item $item,$quantity)
    {
        if($this->has($item)){
            //set quantity to the current quantity + new quantity
            $quantity = $this->get($item)['quantity']+$quantity;
        }
        $this->update($item,$quantity);
        //update session with item
    }

    public function update(item $item ,$quantity)
    {
        if(!$this->item->find($item->id)->hasStock($quantity)){
            throw new QuantityExceededException;
        }
        if((int)$quantity == 0)
        {
            $this->remove($item);
        }
        $this->storage->set($item->id,[
            'item_id'=>(int)$item->id,
            'quantity'=>(int)$quantity,
        ]);
    }
    public function has(item $item)
    {
        return $this->storage->exists($item->id);
    }
    public function remove(item $item)
    {
        $this->storage->undoset($item['id']);
    }

    public function get(item $item)
    {
        return $this->storage->get($item->id);
    }

    public function clear()
    {
        $this->storage->clear();
    }

    public function all()
    {
        $ids=[];
        $items=[];
        foreach($this->storage->all() as $item)
        {
            $ids[]=$item['item_id'];
        }
        $items =$this->item->find($ids);
        foreach($items as $item){
            $item->quantity=$this->get($item)['quantity'];
            $items[] = $item;
        }
        return $items;
    }

    public function itemCount()
    {
        return count($this->storage);
    }

    public function subTotal()
    {
        $total=0;
        foreach($this->all() as $item)
        {
            if($item->outOfStock())
            {
                continue;
            }
            $total=$total+$item->price*$item->quantity;
        }
        return $total;
    }

    public function refresh()
    {
        foreach($this->all() as $item)
        {
            if(!$item->hasStock($item->quantity)) {
                $this->update($item, $item->stock);
            }
        }
    }
}