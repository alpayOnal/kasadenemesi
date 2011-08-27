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
	public function getProducts($userId=null){

		$userId=$this->db->escape($userId);

		if($userId==null)
			$sql='select *,0 as inBasket from products';
		else
			$sql='select products.*, userId as inBasket from 
				products left join baskets 
					on products.id=baskets.productId
					and baskets.userId=\''.$userId.'\' ';
		
		return $this->db->fetch($sql);
	}

	/**
	 * return all products of the basket of a user
	 * @param int $userId
	 * @return array
	 * */
	public function getProductsOfBasket($userId){
		$userId=$this->db->escape($userId);
		
		$sql='select products.*,1 as inBasket 
			from 
			baskets left join products 
				on products.id=baskets.productId
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
	public function addToBasket($productId,$userId){
		
		if($this->isInBasket($productId,$userId))
			return 'the product is already in the user\'s basket.';

		$productId=$this->db->escape($productId);
		$userId=$this->db->escape($userId);

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

	public function isInBasket($productId,$userId){
		$userId=$this->db->escape($userId);
		$productId=$this->db->escape($productId);
	
		$sql='select * from baskets
			where
			userId=\''.$userId.'\' and
			productId=\''.$productId.'\'
			limit 1';

		$this->db->query($sql);
		return $this->db->numRows>0;

	}
}

?>
