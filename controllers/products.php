<?php
require_once('ipage.php');
class productsController extends ipage{
	
	public function initialize(){
		$this->addModel('products');
		$this->products=new products();
		print_r($u);
	}
	

	public function addToBasket(){
		if (isset($this->r['productId']) && 
			$this->r['formName']=='addToBasket'))
			return $this->products->addToBasket(
				$this->u->'id',
				$this-r['productId']
			);
	}
	
	public function getProducts(){
		return $this->loadView('products.php',
			$this->products->getProducts(),false);
		
	}
	
	public function getProductsOfBasket(){
		return $this->loadView('basket.php',
			$this->products->getProductsOfBasket($this->u->id),false);
	}	
}	
?>
