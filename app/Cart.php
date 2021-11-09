<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item,$id,$qty){
        $price=$item->Unit_price;
		$cart = ['qty'=>0, 'tprice'=>0, 'price' => $price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$cart = $this->items[$id];
			}
		}
		$cart['qty']+=$qty;
		$cart['tprice']+=$qty*$price;
		$this->items[$id] = $cart;
        $this->totalQty+=$qty;
		$this->totalPrice += $cart['price']*$qty;
	}
	//xóa 1
	public function reduceByOne($id,$qty){
		$price=$this->items[$id]['item']['Unit_price'];
		$qty1=$this->items[$id]['qty'];
		$this->items[$id]['qty']=$qty;
		$this->items[$id]['tprice'] = $qty*$price;
		$this->totalQty+=($qty-$qty1);
		$this->totalPrice += ($qty-$qty1)*$price;
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$t=$this->items[$id]['qty']*$this->items[$id]['price'];
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $t;
		unset($this->items[$id]);
	}
}
