<?php
require_once('ipage.php');
class productsController extends ipage{
	
	public function initialize(){
		parent::initialize();
		$this->addModel('products');
		$this->products=new products();
	}
	
	public function run(){
		$this->addToBasket();
		parent::run();
	}

	public function addToBasket(){
		if (isset($this->r['productId']) && 
			$this->r['formName']=='addToBasket')
			return $this->products->addToBasket(
				$this->r['productId'],
				$this->u->id
			);
	}
	
	public function viewproducts(){
		
		$p=$this->products->getProducts(
			($this->isLogined?$this->u->id:null)
		);

		return $this->loadView(
			'products.php',
			$p,
			false
		);
		
	}
	
	public function viewbasket(){
		
		return $this->loadView(
			'basket.php',
			$this->products->getProductsOfBasket($this->u->id),
			false
		);
	}	
}	
?>
