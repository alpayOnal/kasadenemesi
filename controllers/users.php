<?php
require_once('ipage.php');
class usersController extends ipage{
	
	public function initialize(){
		$this->addModel('users');
		$this->users=new users();
	}
	
	public function login(){
		if (isset($this->r['email'],$this->r['password']))
			return $this->users->login(
				$this->r['email'],
				$this->r['password']);	
	}
	
	public function register(){
		
		if (isset($this->r['email'],$this->r['password']))
			return $this->users->register(
				$this->r['email'],
				$this->r['password']);	
	}
	
	public function viewuserList(){
		
		return $this->loadView(
			'userList.php',
			$this->users->getUsers(),
			false
		);
		
	}
}
?>
