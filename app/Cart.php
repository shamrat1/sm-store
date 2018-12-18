<?php
/**
 * Created by PhpStorm.
 * User: YSS
 * Date: 11/17/2018
 * Time: 11:25 PM
 */

namespace App;


class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
        else{
            $this->items = null;
        }

    }

    public function add($item, $id){
        $storedItem = ['Qty'=>0, 'price'=>$item->unit_price, 'item'=>$item->name];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
            $storedItem['Qty']++;
            $storedItem['price']= $item->unit_price * $storedItem['Qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice = $item->unit_price;
        }
    }
}