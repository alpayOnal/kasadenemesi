<?php
class products
{
	public function __construct(){
		$this->db=new db();
	}

	/**
	 * returns all products
	 * @return array
	 * */
	public function getProducts(){
		return $this->db->fetch('select * from products');
	}

	/**
	 * return all products of the basket of a user
	 * @param int $userId
	 * @return array
	 * */
	public function getProductsOfBasket($userId){
		$userId=$this->db->escape($userId);
		
		$sql='select * from baskets 
			where 
			userId=\''.$userId.'\'';

		return $this->db->fetch($sql);
	}

	/**
	 * add the specified product into the user's basket
	 * @param int $productId
	 * @param int $userId
	 * @return bool
	 * */
	public function addBasket($productId,$userId){
		$productId=$this->escape($productId);
		$userId=$this->escape($userId);
		
		$sql='insert into baskets
			(userId,productId)
			values
			(\''.$userId.'\',\''.$productId.'\')';

		$this->db->query($sql);

		if($this->db->affectedRows>0)
			return true;
		else{
			$users=new users();
			if(!$users->isRegisteredById($userId))
				return 'unregistered userId';
			elseif(!$this->productExists($productId))
				return 'unexistsed productId';
			
			return false;
		}
	}
	
	
	/**
	 * checks whether the product exists
	 * @param int $productId
	 * @return bool
	 * */
	public function productExists($productId){
		$productId=$this->db->escape($productId);
		$sql='select id from products 
			where
			id=\''.$productId.'\'
			limit 1';

		$this->db->query($sql);
		
		if($this->db->numRows>0)
			return true;

		return false;
	}
}

?>
